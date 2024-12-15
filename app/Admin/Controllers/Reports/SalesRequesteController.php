<?php

namespace App\Admin\Controllers\Reports;

use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Requests;

class SalesRequesteController extends Controller
{
    public function index(Request $request)
    {

        $orders = $this->filter($request);
        $allorders = $this->filterall($request);

        return view('admin.reports.sales_requests.index')->with([
            'orders' => $orders,
            'request' => $request,
            'header' => 'sales Reports',
        ]);
    }

    protected function filterall(Request $request)
    {
        $orders = Requests::with(['service', 'paymentStatus']);

        if ($request->has('search') && $request->has('from_date') && !is_null($request->from_date)) {
            $orders = $orders->whereDate('req_date', '>=', $request->from_date);
        }
        if ($request->has('search') && $request->has('to_date') && !is_null($request->to_date)) {
            $orders = $orders->whereDate('req_date', '<=', $request->to_date);
        }

        if ($request->has('search') && $request->has('from_time') && !is_null($request->from_time)) {
            $orders = $orders->whereTime('req_time', '>=', $request->from_time);
        }
        if ($request->has('search') && $request->has('to_time') && !is_null($request->to_time)) {
            $orders = $orders->whereTime('req_time', '<=', $request->to_time);
        }

        $orderPaidIds = Requests::where('payment_status_id' , 1)->pluck('id')->toArray();
        $orders->where('payment_status_id' , 1);
        $orders = $orders->orderBy('created_at', 'desc')->get();

        return $orders;
    }
    protected function filter(Request $request)
    {
        $orders = Requests::with(['service', 'paymentStatus']);

        if ($request->has('search') && $request->has('from_date') && !is_null($request->from_date)) {
            $orders = $orders->whereDate('req_date', '>=', $request->from_date);
        }
        if ($request->has('search') && $request->has('to_date') && !is_null($request->to_date)) {
            $orders = $orders->whereDate('req_date', '<=', $request->to_date);
        }

        // if ($request->has('search') && $request->has('from_time') && !is_null($request->from_time)) {
        //     $orders = $orders->whereTime('req_time', '>=', $request->from_time);
        // }
        // if ($request->has('search') && $request->has('to_time') && !is_null($request->to_time)) {
        //     $orders = $orders->whereTime('req_time', '<=', $request->to_time);
        // }

        $orders = $orders->where('payment_status_id' , 1)->where('status_id' , 7)->orderBy('created_at', 'desc')->get();

        return $orders;
    }


}
