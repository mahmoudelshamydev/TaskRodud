<?php

namespace App\Admin\Controllers\Reports;

use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Requests;
use App\Models\Service;
use App\Models\Status;
use App\Models\PaymentStatus;
use App\Models\CarMake;
use App\Models\CarModel;
use App\User;

class RequestsController extends Controller
{
    public function index(Request $request)
    {

        $orders = $this->filter($request);
        // dd($orders);
        $user = USer::where('is_active',1)->get();
        $service = Service::all();
        $status = Status::all();
        $payment_status = PaymentStatus::all();
        $car_make = CarMake::all();
        $car_model = CarModel::all();

        return view('admin.reports.requests_report.index')->with([
            'orders' => $orders,
            'users' => $user,
            'services' => $service,
            'orderStatus' => $status,
            'payments_status' => $payment_status,
            'car_makes' => $car_make,
            'car_models' => $car_model,
            'request' => $request,
            'header' => 'Request Reports',
        ]);
    }

    protected function filter(Request $request)
    {
        $orders = Requests::with(['service','make','model','user','status','paymentStatus']);

        if ($request->has('search') && $request->has('service_id') && !is_null($request->service_id)) {
            $orders = $orders->where('service_id', $request->service_id);
        }

        if ($request->has('search') && $request->has('user_id') && !is_null($request->user_id)) {
            $orders = $orders->where('user_id', $request->user_id);
        }

        if ($request->has('search') && $request->has('make_id') && !is_null($request->make_id)) {
            $orders = $orders->where('car_make_id', $request->make_id);
        }

        if ($request->has('search') && $request->has('model_id') && !is_null($request->model_id)) {
            $orders = $orders->where('car_model_id', $request->model_id);
        }

        if ($request->has('search') && $request->has('from_car_year') && !is_null($request->from_car_year)) {
            $orders = $orders->where('car_years', '>=', $request->from_car_year);
        }
        if ($request->has('search') && $request->has('to_car_year') && !is_null($request->to_car_year)) {
            $orders = $orders->where('car_years', '<=', $request->to_car_year);
        }

        if ($request->has('search') && $request->has('status_id') && !is_null($request->status_id)) {
            $orders = $orders->where('status_id', $request->status_id);
        }

        if ($request->has('search') && $request->has('payment_status_id') && !is_null($request->payment_status_id)) {
            $orders = $orders->where('payment_status_id', $request->payment_status_id);
        }

        if ($request->has('search') && $request->has('from_date') && !is_null($request->from_date)) {
            $orders = $orders->whereDate('req_date', '>=', $request->from_date);
        }
        if ($request->has('search') && $request->has('to_date') && !is_null($request->to_date)) {
            $orders = $orders->whereDate('req_date', '<=', $request->to_date);
        }

        if ($request->has('search') && $request->has('discount') && !is_null($request->discount)) {
            $orders = $orders->where('discount', $request->discount);
        }

        $orders = $orders->orderBy('created_at', 'desc')->get();

        return $orders;
    }
}
