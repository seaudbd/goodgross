<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Artisan;

use \App\Http\Controllers\Frontend\HomeController;
use \App\Http\Controllers\Frontend\ProductController;
use \App\Http\Controllers\Frontend\SignInController;
use \App\Http\Controllers\Frontend\RegistrationController;
use \App\Http\Controllers\Frontend\EmailVerificationController;
use \App\Http\Controllers\Frontend\PostProductController;

use \App\Http\Controllers\Frontend\DeliveryAddressController;
use \App\Http\Controllers\Frontend\CheckoutController;
use \App\Http\Controllers\Frontend\CartController;
use \App\Http\Controllers\Frontend\PlaceOrderController;





/*=======================================================ADMIN=======================================================*/
use \App\Http\Controllers\ControlPanel\DashboardController;


use \App\Http\Controllers\ControlPanel\Operation\OrderController;
use \App\Http\Controllers\ControlPanel\Operation\AccountController;
use \App\Http\Controllers\ControlPanel\Operation\PostedItemController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('clear', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return response()->json('all cache cleared');
});


Route::get('check/account/login/status', [SignInController::class, 'checkAccountLoginStatus']);
Route::get('is/shipping/address/available', [CheckoutController::class, 'isShippingAddressAvailable']);
Route::get('is/guest/delivery/address/exist', [CheckoutController::class, 'isGuestDeliveryAddressExist']);


////////////////////////////////////////////////////////////HOME PAGE////////////////////////////////////////////////////////////////////////////////
Route::get('/', [HomeController::class, 'loadHomePage']);
Route::get('get/category/types', [HomeController::class, 'getCategoryTypes']);

////////////////////////////////////////////////////////////PRODUCT////////////////////////////////////////////////////////////////////////////////
Route::get('category/{category_id}', [ProductController::class, 'loadCategorizedProducts']);
Route::get('category/get/categorized/products', [ProductController::class, 'getCategorizedProducts']);
Route::get('category/get/filter/items', [ProductController::class, 'getFilterItems']);
Route::get('product/{product_id}', [ProductController::class, 'loadProduct']);
Route::get('product/add/to/cart', [ProductController::class, 'addToCart']);
Route::get('product/add/to/watch', [ProductController::class, 'addToWatch']);
Route::post('product/add/to/session', [ProductController::class, 'addWholesaleItemToSession']);


////////////////////////////////////Delivery Address/////////////////////////////////////
Route::get('delivery/address', [DeliveryAddressController::class, 'loadDeliveryAddress']);
Route::post('delivery/address/store/in/database', [DeliveryAddressController::class, 'storeInDatabase']);
Route::post('delivery/address/store/in/session', [DeliveryAddressController::class, 'storeInSession']);

/////////////////////////////////////////////////////////Cart//////////////////////////////////////////////////////
Route::get('cart', [CartController::class, 'index']);
Route::get('cart/get/items', [CartController::class, 'getItems']);
Route::get('cart/delete/item', [CartController::class, 'deleteItem']);
Route::get('cart/update/item/quantity', [CartController::class, 'updateItemQuantity']);
Route::get('cart/copy/items/to/checkout', [CartController::class, 'copyItemToCheckout']);



////////////////////////////////////////////////////////////////Checkout/////////////////////////////////////////////////
Route::get('checkout', [CheckoutController::class, 'loadCheckout']);


Route::get('checkout/get/items', [CheckoutController::class, 'getItems']);

Route::get('checkout/get/account/delivery/addresses', [CheckoutController::class, 'getAccountDeliveryAddresses']);
//Route::get('checkout/get/account/delivery/address', [CheckoutController::class, 'getAccountDeliveryAddress']);
Route::get('checkout/get/guest/delivery/address', [CheckoutController::class, 'getGuestDeliveryAddress']);
Route::get('checkout/select/account/delivery/address', [CheckoutController::class, 'selectAccountDeliveryAddress']);
Route::get('checkout/delete/account/delivery/address', [CheckoutController::class, 'deleteAccountDeliveryAddress']);
Route::get('checkout/get/account/delivery/address/by/id', [CheckoutController::class, 'getAccountDeliveryAddressById']);
Route::post('checkout/save/account/delivery/address', [CheckoutController::class, 'saveAccountDeliveryAddress']);
Route::post('checkout/save/guest/delivery/address', [CheckoutController::class, 'saveGuestDeliveryAddress']);

Route::get('checkout/get/account/billing/address', [CheckoutController::class, 'getAccountBillingAddress']);
Route::get('checkout/get/guest/billing/address', [CheckoutController::class, 'getGuestBillingAddress']);
Route::get('checkout/get/account/billing/address/by/id', [CheckoutController::class, 'getAccountBillingAddressById']);
Route::post('checkout/save/billing/address/for/account', [CheckoutController::class, 'saveBillingAddressForAccount']);
Route::post('checkout/save/billing/address/for/guest', [CheckoutController::class, 'saveBillingAddressForGuest']);



Route::get('checkout/get/account/cards', [CheckoutController::class, 'getAccountCards']);
Route::get('checkout/get/account/card/by/id', [CheckoutController::class, 'getAccountCardById']);
Route::get('checkout/delete/card/from/account', [CheckoutController::class, 'deleteCardFromAccount']);
Route::get('checkout/select/card/for/account', [CheckoutController::class, 'selectCardForAccount']);
Route::post('checkout/save/card/for/account', [CheckoutController::class, 'saveCardForAccount']);
Route::get('checkout/get/guest/card', [CheckoutController::class, 'getGuestCard']);
Route::post('checkout/save/card/for/guest', [CheckoutController::class, 'saveCardForGuest']);
Route::get('checkout/delete/guest/card', [CheckoutController::class, 'deleteGuestCard']);

//Route::get('checkout/add/product', [CheckoutController::class, 'addProduct']);
Route::post('checkout', [CheckoutController::class, 'processCheckout']);
Route::get('checkout/initiate/paypal', [CheckoutController::class, 'initiatePaypal']);
Route::get('checkout/initiate/stripe', [CheckoutController::class, 'initiateStripe']);
Route::get('checkout/paypal/payment/status', [CheckoutController::class, 'paypalPaymentStatus']);
Route::get('checkout/paypal/payment/cancel', [CheckoutController::class, 'paypalPaymentCancel']);
Route::get('checkout/success/{order_id}', [CheckoutController::class, 'success']);


/////////////////////////////////////////////////////////////////Place an Order////////////////////////////////////////////////////
Route::get('place/order', [PlaceOrderController::class, 'index']);




////////////////////////////////////////////////////////////ACCOUNT SIGN IN AND SIGN OUT////////////////////////////////////////////////////////////////////////////////
Route::get('account/sign/in', [SignInController::class, 'loadAccountSignIn']);
Route::post('authenticate/account/sign/in', [SignInController::class, 'authenticateAccountSignIn']);

Route::get('auth/redirect/to/{provider}/{where_to}', [SignInController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SignInController::class, 'handleProviderCallback']);

Route::get('account/sign/out', [SignInController::class, 'accountSignOut'])->middleware('redirect.to.dashboard.if.authenticated');

////////////////////////////////////////////////////////////CONTROL PANEL SIGN IN AND SIGN OUT////////////////////////////////////////////////////////////////////////////////
Route::get('control/panel/sign/in', [SignInController::class, 'loadControlPanelSignIn']);
Route::post('authenticate/control/panel/sign/in', [SignInController::class, 'authenticateControlPanelSignIn']);

////////////////////////////////////////////////////////////ACCOUNT REGISTRATION////////////////////////////////////////////////////////////////////////////////
Route::get('registration/{id?}', [RegistrationController::class, 'loadRegistration']);
Route::get('get/states/by/country/id', [RegistrationController::class, 'getStatesByCountryId']);
Route::post('register/personal/account', [RegistrationController::class, 'registerPersonalAccount']);
Route::post('register/business/account', [RegistrationController::class, 'registerBusinessAccount']);

////////////////////////////////////////////////////////////ACCOUNT VERIFICATION////////////////////////////////////////////////////////////////////////////////
Route::get('email/verification/{account_id}', [EmailVerificationController::class, 'loadEmailVerification']);
Route::post('verify/email', [EmailVerificationController::class, 'verifyEmail']);

////////////////////////////////////////////////////////////FORGOTTEN PASSWORD////////////////////////////////////////////////////////////////////////////////
Route::get('forgotten/password', [SignInController::class, 'loadForgottenPassword']);
Route::post('send/verification/code', [EmailVerificationController::class, 'sendVerificationCode']);

Route::post('resetting/password', [SignInController::class, 'loadResettingPassword']);


////////////////////////////////////////////////////////////POST PRODUCT////////////////////////////////////////////////////////////////////////////////
Route::get('post/product', [PostProductController::class, 'loadPostingProduct']);
Route::get('post/product/get/categories/by/category/type/id', [PostProductController::class, 'getCategoriesByCategoryTypeId']);
Route::get('post/product/get/child/categories/by/category/id', [PostProductController::class, 'getChildCategoriesByCategoryId']);
Route::post('post/product/upload/file', [PostProductController::class, 'uploadFile']);
Route::post('post/product/remove/uploaded/file', [PostProductController::class, 'removeUploadedFile']);
Route::post('post/product', [PostProductController::class, 'postProduct']);





/////////////////////////////////////////////////////Account///////////////////////////////////////////////////////////////

Route::get('get/account/notifications', [\App\Http\Controllers\Account\DashboardController::class, 'getAccountNotifications'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/dashboard', [\App\Http\Controllers\Account\DashboardController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('account/post/product', [\App\Http\Controllers\Account\PostProductController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/post/product/get/categories/{made_for}', [\App\Http\Controllers\Account\PostProductController::class, 'getCategories']);
Route::get('account/post/product/get/child/categories/{category_id}', [\App\Http\Controllers\Account\PostProductController::class, 'getChildCategories']);
Route::post('account/post/product', [\App\Http\Controllers\Account\PostProductController::class, 'postProduct']);


Route::post('account/change/from/personal/to/business/account', [\App\Http\Controllers\Account\DashboardController::class, 'changeFromPersonalToBusinessAccount'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('account/change/from/retail/to/wholesale/account', [\App\Http\Controllers\Account\DashboardController::class, 'changeFromRetailToWholesaleAccount'])->middleware('redirect.to.dashboard.if.authenticated');


Route::get('account/my/posting/{section}', [\App\Http\Controllers\Account\MyPostingController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('account/my/payment', [\App\Http\Controllers\Account\MyPaymentController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/my/payment/link/connected/account', [\App\Http\Controllers\Account\MyPaymentController::class, 'linkConnectedAccount'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/my/payment/connected/account/refresh/{connected_account_id}', [\App\Http\Controllers\Account\MyPaymentController::class, 'connectedAccountRefresh'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/my/payment/linked/account/success/{connected_account_id}', [\App\Http\Controllers\Account\MyPaymentController::class, 'linkedAccountSuccess'])->middleware('redirect.to.dashboard.if.authenticated');

Route::get('account/notification', [\App\Http\Controllers\Account\NotificationController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/notification/get/records', [\App\Http\Controllers\Account\NotificationController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('account/notification/get/record', [\App\Http\Controllers\Account\NotificationController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');

//Route::get('account/panel/sign/out', [SignInController::class, 'signOut'])->middleware('redirect.to.dashboard.if.authenticated');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////Control Panel///////////////////////////////////////////////////////////////////////////////////////////

Route::get('control/panel/dashboard', [DashboardController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('get/control/panel/notifications', [\App\Http\Controllers\ControlPanel\DashboardController::class, 'getAdminNotifications'])->middleware('redirect.to.dashboard.if.authenticated');

use \App\Http\Controllers\ControlPanel\Configuration\CategoryTypeController;
Route::get('control/panel/configuration/category/type', [CategoryTypeController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/category/type/get/records/{search_key}/{record_per_page}', [CategoryTypeController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/category/type/get/record', [CategoryTypeController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/type/save/record', [CategoryTypeController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/type/apply/bulk/operation', [CategoryTypeController::class, 'applyBulkOperation'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/type/delete/record', [CategoryTypeController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');

use \App\Http\Controllers\ControlPanel\Configuration\SectionController;
Route::get('control/panel/configuration/section', [SectionController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/section/get/records/{search_key}/{record_per_page}', [SectionController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/section/get/record', [SectionController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/section/save/record', [SectionController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/section/apply/bulk/operation', [SectionController::class, 'applyBulkOperation'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/section/delete/record', [SectionController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');

use \App\Http\Controllers\ControlPanel\Configuration\PropertyController;
Route::get('control/panel/configuration/property', [PropertyController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/property/get/records/{category_type_id}/{search_key}/{record_per_page}', [PropertyController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/property/get/record', [PropertyController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/property/save/record', [PropertyController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/property/apply/bulk/operation', [PropertyController::class, 'applyBulkOperation'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/property/delete/record', [PropertyController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/property/get/records/from/section/by/category/type/id', [PropertyController::class, 'getRecordsFromSectionByCategoryTypeId'])->middleware('redirect.to.dashboard.if.authenticated');


use \App\Http\Controllers\ControlPanel\Configuration\CategoryController;
Route::get('control/panel/configuration/category', [CategoryController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/category/get/records/{category_type_id}/{level}/{search_key}/{record_per_page}', [CategoryController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/category/get/record', [CategoryController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/save/record', [CategoryController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/apply/bulk/operation', [CategoryController::class, 'applyBulkOperation'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/delete/record', [CategoryController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/configuration/category/update/sequence', [CategoryController::class, 'updateSequence'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/category/get/root/records/by/category/type/id/and/level', [CategoryController::class, 'getRootRecordsByCategoryTypeIdAndLevel'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/configuration/category/get/records/from/section/by/category/type/id', [CategoryController::class, 'getRecordsFromSectionByCategoryTypeId'])->middleware('redirect.to.dashboard.if.authenticated');





use \App\Http\Controllers\ControlPanel\Settings\SalesTaxController;
Route::get('control/panel/settings/sales/tax', [SalesTaxController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/settings/sales/tax/get/records/{search_key}/{record_per_page}', [SalesTaxController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/settings/sales/tax/get/record', [SalesTaxController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/settings/sales/tax/save/record', [SalesTaxController::class, 'saveRecord'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/settings/sales/tax/execute/bulk/add/or/update', [SalesTaxController::class, 'executeBulkAddOrUpdate'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/settings/sales/tax/apply/bulk/operation', [SalesTaxController::class, 'applyBulkOperation'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/settings/sales/tax/delete/record', [SalesTaxController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');






Route::get('control/panel/operation/account', [AccountController::class, 'index']);
Route::get('control/panel/operation/account/get/records/{search_key}/{record_per_page}', [AccountController::class, 'getRecords']);

Route::get('control/panel/operation/posted/retail/items', [PostedItemController::class, 'loadRetailItems']);
Route::get('control/panel/operation/posted/retail/items/get/records/{search_key}/{record_per_page}', [PostedItemController::class, 'getRetailRecords']);
Route::post('control/panel/operation/posted/retail/items/apply/bulk/operation', [PostedItemController::class, 'applyBulkOperationOnRetailItems']);
Route::post('control/panel/operation/posted/retail/items/change/status', [PostedItemController::class, 'changeStatusOfRetailItem']);

Route::get('control/panel/operation/posted/wholesale/items', [PostedItemController::class, 'loadWholesaleItems']);
Route::get('control/panel/operation/posted/wholesale/items/get/records/{search_key}/{record_per_page}', [PostedItemController::class, 'getWholesaleRecords']);
Route::post('control/panel/operation/posted/wholesale/items/apply/bulk/operation', [PostedItemController::class, 'applyBulkOperationOnWholesaleItems']);
Route::post('control/panel/operation/posted/wholesale/items/change/status', [PostedItemController::class, 'changeStatusOfWholesaleItem']);


Route::get('control/panel/operation/order', [OrderController::class, 'index']);
Route::get('control/panel/operation/order/get/records/{search_key}/{record_per_page}', [OrderController::class, 'getRecords']);
Route::get('control/panel/operation/order/get/order/details/records', [OrderController::class, 'getOrderDetailsRecords']);
Route::post('control/panel/operation/order/payout/to/seller', [OrderController::class, 'payoutToSeller']);





use \App\Http\Controllers\ControlPanel\Miscellaneous\NotificationController;
Route::get('control/panel/miscellaneous/notification', [NotificationController::class, 'index'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/miscellaneous/notification/get/records/{search_key}/{record_per_page}', [NotificationController::class, 'getRecords'])->middleware('redirect.to.dashboard.if.authenticated');
Route::get('control/panel/miscellaneous/notification/get/record', [NotificationController::class, 'getRecord'])->middleware('redirect.to.dashboard.if.authenticated');

Route::post('control/panel/miscellaneous/notification/apply/bulk/operation', [NotificationController::class, 'applyBulkOperation'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/miscellaneous/notification/delete/record', [NotificationController::class, 'deleteRecord'])->middleware('redirect.to.dashboard.if.authenticated');




Route::get('control/panel/sign/out', [SignInController::class, 'controlPanelSignOut'])->middleware('redirect.to.dashboard.if.authenticated');
Route::post('control/panel/change/password', 'Admin\DashboardController@changePassword')->middleware('redirect.to.dashboard.if.authenticated');



























Route::fallback(function () {
    return view('Errors.404');
});
