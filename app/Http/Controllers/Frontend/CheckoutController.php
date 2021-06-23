<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;


use App\Models\Account;
use App\Models\UserNotification;
use App\Models\Guest;
use App\Models\AccountNotification;
use App\Models\Option;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderShipping;
use App\Models\OrderTransaction;
use App\Models\Product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use \Stripe\StripeClient;
use \Exception;
use \Stripe\Exception\CardException;
use \Stripe\Exception\RateLimitException;
use \Stripe\Exception\InvalidRequestException;
use \Stripe\Exception\AuthenticationException;
use \Stripe\Exception\ApiConnectionException;
use \Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $paypalConf = Config::get('paypal');
        $this->apiContext = new ApiContext(new OAuthTokenCredential(
                $paypalConf['client_id'],
                $paypalConf['secret'])
        );
        $this->apiContext->setConfig($paypalConf['settings']);

    }

    public function index()
    {
        $title = 'Checkout | GoodGross';
        $checkoutItems =  Session::get('checkout_items');
        $activeNav = 'Checkout';
        if (Session::has('account_login_status')) {
            $accountLoginStatus = true;
        } else {
            $accountLoginStatus = false;
        }
        return view('Frontend.checkout', compact('title', 'checkoutItems', 'activeNav', 'accountLoginStatus'));
    }

    public function checkAccountLoginStatus()
    {
        if (Session::has('account_login_status')) {
            return response()->json(['account_login_status' => true]);
        } else {
            return response()->json(['account_login_status' => false]);
        }
    }

    public function addProduct(Request $request)
    {
        $product = Product::where('id', $request->get('product_id'))->with('account', 'productProperties')->first();
        $product['quantity'] = $request->quantity;
        Session::forget('checkout_items');
        Session::push('checkout_items', $product);
        return response()->json('Product Added Successfully');
    }

    public function process(CheckoutRequest $request)
    {

        $shippingInformation = $request->all(['first_name_for_shipping', 'last_name_for_shipping', 'address_line_1_for_shipping', 'address_line_2_for_shipping', 'country_for_shipping', 'city_for_shipping', 'region_for_shipping', 'postal_code_for_shipping', 'email_for_shipping', 'phone_for_shipping']);
        Session::put('shipping_information', $shippingInformation);
        
        if ($request->has('different_from_shipping_information')) {
            $billingInformation = $request->all(['first_name_for_billing', 'last_name_for_billing', 'address_line_1_for_billing', 'address_line_2_for_billing', 'country_for_billing', 'city_for_billing', 'region_for_billing', 'postal_code_for_billing', 'email_for_billing', 'phone_for_billing']);
            $billingInformation['is_different_from_shipping'] = true;
        } else {
            $billingInformation['is_different_from_shipping'] = false;
        }
        Session::put('billing_information', $billingInformation);
        
        if ($request->get('payment_method') === 'Card') {
            $cardInformation = $request->all(['card_number', 'card_cvc', 'expiry_month', 'expiry_year']);
            Session::put('card_information', $cardInformation);
        }
        if ($request->has('create_an_account')) {
            $accountInformation = $request->all(['first_name_for_account', 'last_name_for_account', 'email_for_account', 'password_for_account']);
        } else {
            $accountInformation = null;
        }
        Session::put('account_information', $accountInformation);
        if ($request->payment_method === 'PayPal') {
            $this->initiatePaypal();
        } elseif ($request->payment_method === 'Card') {
            return response()->json($this->initiateCard());
        }

    }



    public function initiatePaypal()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $checkoutItems =  Session::get('checkout_items');

        $checkoutTotal = 0;
        foreach ($checkoutItems as $key => $checkoutItem) {

            $propertyValues = json_decode($checkoutItem->property_values);
            $checkoutTotal += $propertyValues->{"Price Per Unit"} * $checkoutItem->quantity;
            $items[$key] = new Item();
            $items[$key]->setName($propertyValues->Title)
                ->setCurrency('USD')
                ->setQuantity($checkoutItem->quantity)
                ->setSku($propertyValues->{"Custom Label (SKU)"})
                ->setPrice($propertyValues->{"Price Per Unit"});
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        $shipTo = Session::get('ship_to');
        $shippingAddress = [
            "recipient_name" => $shipTo['first_name'] . ' ' . $shipTo['last_name'],
            "line1" => $shipTo['address_line_1'],
            "line2" => $shipTo['address_line_2'] === null ? '---' : $shipTo['address_line_2'],
            "city" => $shipTo['city'],
            "country_code" => "US",
            "postal_code" => $shipTo['zip_code'],
            "state" => $shipTo['region'],
            "phone" => $shipTo['phone']
        ];

        $itemList->setShippingAddress($shippingAddress);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($checkoutTotal);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($checkoutTotal)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("PayPal Checkout")
            ->setInvoiceNumber(uniqid());

        $baseUrl = url('/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/checkout/paypal/payment/status")
            ->setCancelUrl("$baseUrl/checkout/paypal/payment/cancel");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {

            if (\Config::get('app.debug')) {
                Session::put('checkout_error', 'Connection Timeout');
                return Redirect::to('checkout');
            } else {
                Session::put('checkout_error', 'Some Error Occurred. Sorry for Inconvenience.');
                return Redirect::to('checkout');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectUrl = $link->getHref();
                break;
            }
        }

        if (isset($redirectUrl)) {
            return Redirect::away($redirectUrl);
        }

        Session::put('checkout_error', 'Unknown Error Occurred');
        return Redirect::to('checkout');



    }

    public function paypalPaymentStatus(Request $request)
    {
        $requestQuery = $request->query();
        $paymentId = $requestQuery['paymentId'];

        if (empty($requestQuery['PayerID']) || empty($requestQuery['token'])) {
            Session::put('checkout_error', 'Payment Failed');
            return Redirect::to('checkout');
        }

        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($requestQuery['PayerID']);

        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {

            $shipTo = Session::get('ship_to');
            $guest = new Guest();
            $guest->country = $shipTo['country'];
            $guest->first_name = $shipTo['first_name'];
            $guest->last_name = $shipTo['last_name'];
            $guest->address_line_1 = $shipTo['address_line_1'];
            $guest->address_line_2 = $shipTo['address_line_2'] === null ? '---' : $shipTo['address_line_2'];
            $guest->city = $shipTo['city'];
            $guest->region = $shipTo['region'];
            $guest->zip_code = $shipTo['zip_code'];
            $guest->email = $shipTo['email'];
            $guest->phone = $shipTo['phone'];
            $guest->save();

            $order = new Order();
            $order->number = time();
            $order->buyer_id = $guest->id;
            $order->is_guest = true;
            $order->transaction_object = $result;
            $order->transact_through = 'PayPal';
            $order->status = 'Processing';
            $order->save();

            $checkoutItems = Session::get('checkout_items');
            foreach ($checkoutItems as $key => $checkoutItem) {
                $propertyValues = json_decode($checkoutItem->property_values);
                $transaction = new \App\Models\Transaction();
                $transaction->order_id = $order->id;
                $transaction->product_id = $checkoutItem->id;
                $transaction->quantity = $checkoutItem->quantity;
                $transaction->price_per_unit = $propertyValues->{"Price Per Unit"};
                $transaction->payment_status = 'Released';
                $transaction->payout_status = 'Held';
                $transaction->delivery_status = 'Processing';
                $transaction->status = 'Processing';
                $transaction->save();
            }
            Session::forget(['checkout_items', 'cart_items', 'ship_to', 'card_information', 'checkout_error']);
            return Redirect::to('checkout/success/' . $order->id);
        }

        Session::put('checkout_error', 'Payment Failed');
        return Redirect::to('checkout');
    }


    public function success($orderId)
    {
        $title = 'My Checkout: Success | GoodGross';
        $activeNav = 'My Checkout: Success';
        $order = Order::where('id', $orderId)->with(['account', 'orderTransactions.product.account', 'orderTransactions.product.productProperties'])->first();
        return view('checkout_success', compact('title', 'activeNav', 'order'));
    }

    public function paypalPaymentCancel()
    {
        return Redirect::to('checkout');
    }




    public function initiateCard()
    {
        $stripeConf = Config::get('stripe');
        $stripe = new StripeClient(
            $stripeConf['secret']
        );
        $cardInformation = Session::get('card_information');
        try {
            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $cardInformation['card_number'],
                    'exp_month' => intval($cardInformation['expiry_month']),
                    'exp_year' => intval($cardInformation['expiry_year']),
                    'cvc' => $cardInformation['card_cvc'],
                ],
            ]);

            if (!isset($token->id)) {
                return ['success' => false, 'message' => 'Failed to Initiate Payment'];
            }
            $checkoutItems = Session::get('checkout_items');
            $checkoutTotal = 0;
            foreach ($checkoutItems as $key => $checkoutItem) {
                $checkoutTotal += $checkoutItem->productProperties->where('property', 'Price')->first('value')->value * $checkoutItem->quantity;
            }

            $charge = $stripe->charges->create([
                'currency' => 'USD',
                'amount' => $checkoutTotal * 100,
                'source' => $token->id,
                'description' => 'Checkout',
            ]);

            if($charge->status == 'succeeded') {
                $shippingInformation = Session::get('shipping_information');
                $billingInformation = Session::get('billing_information');
                $accountInformation = Session::get('account_information');
                if ($accountInformation === null) {
                    if (Session::has('account_login_status')) {
                        $account = Account::where('id', Session::get('account_id'))->first();
                    } else {
                        $account = new Account();
                        $account->first_name = $shippingInformation['first_name_for_shipping'];
                        $account->last_name = $shippingInformation['last_name_for_shipping'];
                        $account->email = $shippingInformation['email_for_shipping'];
                        $account->login_id = $shippingInformation['email_for_shipping'];
                        $account->type = 'Guest';
                        $account->verification_code = strtoupper(Str::random(6));
                        $account->status = 'Pending';
                        $account->save();
                    }
                } else {
                    $number = Account::where('type', 'Personal')->max('number');
                    if (empty($number)) {
                        $number = 100000;
                    } else {
                        $number += 1;
                    }
                    $account = new Account();
                    $account->number = $number;
                    $account->first_name = $accountInformation['first_name_for_account'];
                    $account->last_name = $accountInformation['last_name_for_account'];
                    $account->email = $accountInformation['email_for_account'];
                    $account->password = Hash::make($accountInformation['password_for_account']);
                    $account->login_id = $accountInformation['email_for_account'];
                    $account->type = 'Personal';
                    $account->verification_code = strtoupper(Str::random(6));
                    $account->status = 'Pending';
                    $account->save();
                }


                $order = new Order();
                $order->number = time();
                $order->account_id = $account->id;
                $order->transaction_object = json_encode($charge);
                $order->transact_through = 'Stripe';
                $order->status = 'Processing';
                $order->save();

                $orderShipping = new OrderShipping();
                $orderShipping->order_id = $order->id;
                $orderShipping->first_name = $shippingInformation['first_name_for_shipping'];
                $orderShipping->last_name = $shippingInformation['last_name_for_shipping'];
                $orderShipping->email = $shippingInformation['email_for_shipping'];
                $orderShipping->phone = $shippingInformation['phone_for_shipping'];
                $orderShipping->address_line_1 = $shippingInformation['address_line_1_for_shipping'];
                $orderShipping->address_line_2 = $shippingInformation['address_line_2_for_shipping'];
                $orderShipping->country = $shippingInformation['country_for_shipping'];
                $orderShipping->city = $shippingInformation['city_for_shipping'];
                $orderShipping->region = $shippingInformation['region_for_shipping'];
                $orderShipping->postal_code = $shippingInformation['postal_code_for_shipping'];
                $orderShipping->save();

                $orderBilling = new OrderBilling();
                $orderBilling->order_id = $order->id;
                if ($billingInformation['is_different_from_shipping'] === false) {
                    $orderBilling->first_name = $shippingInformation['first_name_for_shipping'];
                    $orderBilling->last_name = $shippingInformation['last_name_for_shipping'];
                    $orderBilling->email = $shippingInformation['email_for_shipping'];
                    $orderBilling->phone = $shippingInformation['phone_for_shipping'];
                    $orderBilling->address_line_1 = $shippingInformation['address_line_1_for_shipping'];
                    $orderBilling->address_line_2 = $shippingInformation['address_line_2_for_shipping'];
                    $orderBilling->country = $shippingInformation['country_for_shipping'];
                    $orderBilling->city = $shippingInformation['city_for_shipping'];
                    $orderBilling->region = $shippingInformation['region_for_shipping'];
                    $orderBilling->postal_code = $shippingInformation['postal_code_for_shipping'];
                } else {
                    $orderBilling->first_name = $billingInformation['first_name_for_billing'];
                    $orderBilling->last_name = $billingInformation['last_name_for_billing'];
                    $orderBilling->email = $billingInformation['email_for_billing'];
                    $orderBilling->phone = $billingInformation['phone_for_billing'];
                    $orderBilling->address_line_1 = $billingInformation['address_line_1_for_billing'];
                    $orderBilling->address_line_2 = $billingInformation['address_line_2_for_billing'];
                    $orderBilling->country = $billingInformation['country_for_billing'];
                    $orderBilling->city = $billingInformation['city_for_billing'];
                    $orderBilling->region = $billingInformation['region_for_billing'];
                    $orderBilling->postal_code = $billingInformation['postal_code_for_billing'];
                }

                $orderBilling->save();


                foreach ($checkoutItems as $key => $checkoutItem) {

                    $orderTransaction = new OrderTransaction();
                    $orderTransaction->order_id = $order->id;
                    $orderTransaction->product_id = $checkoutItem->id;
                    $orderTransaction->quantity = $checkoutItem->quantity;
                    $orderTransaction->price_per_unit = $checkoutItem->productProperties->where('property', 'Price')->first('value')->value;
                    $orderTransaction->payment_status = 'Released';
                    $orderTransaction->payout_status = 'Held';
                    $orderTransaction->delivery_status = 'Processing';
                    $orderTransaction->status = 'Processing';
                    $orderTransaction->save();

                    $accountNotification = new AccountNotification();
                    $accountNotification->account_id = $checkoutItem->account->id;
                    $accountNotification->type = 'Transaction';
                    $accountNotification->title = 'A Order of the Product "' . $checkoutItem->productProperties->where('property', 'Title')->first('value')->value . '" has been Made from "' . $account->first_name . ' ' . $account->last_name . '"';
                    $accountNotification->order_transaction_id = $orderTransaction->id;
                    $accountNotification->save();

                    $adminNotification = new UserNotification();
                    $adminNotification->user_id = 1;
                    $adminNotification->type = 'Transaction';
                    $adminNotification->title = 'A Order of the Product "' . $checkoutItem->productProperties->where('property', 'Title')->first('value')->value . '" Owned by "' . $checkoutItem->account->number . '-' . $checkoutItem->account->business_name . '" has been Made from "' . $account->first_name . ' ' . $account->last_name . '"';
                    $adminNotification->order_transaction_id = $orderTransaction->id;
                    $adminNotification->save();
                }
                Session::forget(['checkout_items', 'cart_items', 'shipping_information', 'billing_information', 'card_information']);
                return ['success' => true, 'message' => $order];
            } else {
                return ['success' => false, 'message' => 'Failed to Charge the Payment'];
            }

        } catch(CardException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (RateLimitException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (InvalidRequestException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (AuthenticationException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (ApiConnectionException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (ApiErrorException $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }




    }
}