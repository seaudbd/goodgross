<?php

namespace App\Http\Controllers\ControlPanel\Report;

use App\Http\Controllers\Controller;
use App\Models\ControlPanel\Configuration\SiteItem\Venue;
use App\Models\Account\PaymentMethod;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function index($id)
    {
        $firstLevelMenus = Menu::where('root_id', 0)->where('status', 'Active')->get();
        $operationLists = explode(',', Menu::where('id', $id)->first()->operation_list);
        $finalOperationLists = [];
        foreach ($operationLists as $operationList) {
            $temp = explode(':', $operationList);
            $finalOperationLists[$temp[0]] = $temp[1];
        }
        $activeMenuValue = $finalOperationLists['activeMenuValue'];
        $activeSubMenuValue = $finalOperationLists['activeSubMenuValue'];
        $title = $activeSubMenuValue;
        $activeMenuId = $finalOperationLists['activeMenuId'];
        $activeSubMenuId = $finalOperationLists['activeSubMenuId'];
        $recordPerPage = $finalOperationLists['recordPerPage'];
        $venues = Venue::where('status', 'Active')->get();
        return view('ControlPanel.Report.booking', compact(
            'title',
            'activeMenuId',
            'activeSubMenuId',
            'activeMenuValue',
            'activeSubMenuValue',
            'firstLevelMenus',
            'recordPerPage',
            'venues'
        ));
    }

    public function gets($bookingDateFrom, $bookingDateTo, $startDate, $endDate, $venueId, $status)
    {
        $bookingDateFrom = $bookingDateFrom !== 'null' ? date('Y-m-d', strtotime($bookingDateFrom)) . ' 00:00:00' : $bookingDateFrom;
        $bookingDateTo = $bookingDateTo !== 'null' ? date('Y-m-d', strtotime($bookingDateTo)) . ' 23:59:59' : $bookingDateTo;
        $startDate = $startDate !== 'null' ? date('Y-m-d', strtotime($startDate)) . ' 00:00:00' : $startDate;
        $endDate = $endDate !== 'null' ? date('Y-m-d', strtotime($endDate)) . ' 23:59:59' : $endDate;

        $response = PaymentMethod::
            where(function ($query) use ($bookingDateFrom, $bookingDateTo, $startDate, $endDate, $venueId, $status) {
                if ($status !== 'null') {
                    $query->where('status', $status);
                }
                if ($venueId !== 'null') {
                    $query->where('venue_id', $venueId);
                }
                if ($bookingDateFrom !== 'null' && $bookingDateTo !== 'null') {
                    $query->whereBetween('created_at', [$bookingDateFrom, $bookingDateTo]);
                }
                if ($startDate !== 'null') {
                    $query->where('starting_date_time', '>=', $startDate);
                    if ($endDate !== 'null') {
                        $query->where('ending_date_time', '<=', $endDate);
                    }
                }
                if ($endDate !== 'null') {
                    $query->where('ending_date_time', '<=', $endDate);
                    if ($startDate !== 'null') {
                        $query->where('starting_date_time', '>=', $startDate);
                    }
                }

            })
            ->with('customer')
            ->with('venue')
            ->get();
        return response()->json($response);
    }

    public function generateReport(Request $request)
    {
        $bookingDateFrom = $request->get('booking_date_from');
        $bookingDateTo = $request->get('booking_date_to');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $venueId = $request->get('venue_id');
        $status = $request->get('status');
        $bookingDateFrom = $bookingDateFrom !== 'null' ? date('Y-m-d', strtotime($bookingDateFrom)) . ' 00:00:00' : $bookingDateFrom;
        $bookingDateTo = $bookingDateTo !== 'null' ? date('Y-m-d', strtotime($bookingDateTo)) . ' 23:59:59' : $bookingDateTo;
        $startDate = $startDate !== 'null' ? date('Y-m-d', strtotime($startDate)) . ' 00:00:00' : $startDate;
        $endDate = $endDate !== 'null' ? date('Y-m-d', strtotime($endDate)) . ' 23:59:59' : $endDate;

        $response = PaymentMethod::
            where(function ($query) use ($bookingDateFrom, $bookingDateTo, $startDate, $endDate, $venueId, $status) {
                if ($status !== 'null') {
                    $query->where('status', $status);
                }
                if ($venueId !== 'null') {
                    $query->where('venue_id', $venueId);
                }
                if ($bookingDateFrom !== 'null' && $bookingDateTo !== 'null') {
                    $query->whereBetween('created_at', [$bookingDateFrom, $bookingDateTo]);
                }
                if ($startDate !== 'null') {
                    $query->where('starting_date_time', '>=', $startDate);
                    if ($endDate !== 'null') {
                        $query->where('ending_date_time', '<=', $endDate);
                    }
                }
                if ($endDate !== 'null') {
                    $query->where('ending_date_time', '<=', $endDate);
                    if ($startDate !== 'null') {
                        $query->where('starting_date_time', '>=', $startDate);
                    }
                }
            })
            ->with('customer')
            ->with('venue')
            ->get();

        $pdf = PDF::loadView('ControlPanel.Report.booking_pdf', compact('response'));
        Storage::disk('public')->put('report/booking_report.pdf', $pdf->output()) ;
        return response()->json(asset('storage/report/booking_report.pdf'));
    }
}
