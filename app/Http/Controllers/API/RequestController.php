<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\ReSheduleMail;
use App\Mail\RequestServiceMail;
use Mail;

use Carbon\Carbon;
use App\User;
use App\Models\Requests;
use App\Models\Days;
use App\Models\Area;
use App\Models\TimeSlot;
use App\Models\Service;
use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\Setting;
use App\Models\Notification;

use App\Http\Resources\Request as RequestResource;

class RequestController extends Controller
{
    public function __construct(){
        Auth::shouldUse('api');
    }

    public function placeRequest(Request $request)
    {



  
            $validate = Validator::make($request->all(), [
                'location' => 'required',
                'size' => 'required',
                'weight' => 'required'
            ]);


        if ($validate->fails()) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validate->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);
        }

        $air_sup = Auth::user();

        if (!$air_sup) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.Unauthorized');
            return response()->json($response, 200);
        }

        $order = new Requests();
        $order->user_id = Auth::Id();
        $order->location = $request->location;
        $order->size = $request->size;
        $order->weight = $request->weight;
        $order->pickup = $request->pickup;
        $order->delivery = $request->delivery;
        $order->status_id = 1;
        $order->save();

		 Mail::to(Auth::user()->email)->send(new RequestServiceMail($order));


        $adminNotify = new Notification();
		$adminNotify->request_id = $order->id ;
		$adminNotify->text = 'New Request Placed #'.$order->id ;
		$adminNotify->admin_read = 0;
		$adminNotify->save();

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['id'] = $order->id;
        $success['requests'] =  new RequestResource($order) ;
        $success['isORder'] = 1;
        return response()->json($success, 200);
    }

    public function generateRequestUniqueNumber()
	{
		$requestUniqueNumber = rand(10000000, 99999999);
		$request = Requests::where('number_request', $requestUniqueNumber)->first();

		if (!$request) {
			return $requestUniqueNumber;
		}

		$this->generateRequestUniqueNumber();
	}

    public function getRequestsType(Request $request)
    {
        $air_sup = Auth::user();

        if (!$air_sup) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.Unauthorized');
            return response()->json($response, 200);
        }
        if($request->type == 'active'){
            $requests = Requests::whereNotIn('status_id', [7,8,9,10])->where('user_deleted',0)->where('user_id',Auth::Id())->orderBy('id',"desc")->get();
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = '';
            // dd($requests);
            $success['requests'] = RequestResource::collection($requests);
            return response()->json($success, 200);
        }elseif($request->type == 'history'){
            $requests = Requests::whereIn('status_id', [7,8,9,10])->where('user_deleted',0)->where('user_id',Auth::Id())->get();
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = '';
            $success['requests'] = RequestResource::collection($requests);
            return response()->json($success, 200);
        }
        
    }

    public function getTrackRequest(Request $request)
    {
        $requests = Requests::Where('number_request',$request->request_id)->Where('user_phone',$request->mobile)->first();
        if($requests){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = '';
            $success['request'] = new RequestResource($requests);
            return response()->json($success, 200);
        }else{
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.not_found");
            return response()->json($response, 200);
        }
    }

    public function getRequestDetails(Request $request)
    {
        $air_sup = Auth::user();

        if (!$air_sup) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.Unauthorized');
            return response()->json($response, 200);
        }

        $requests = Requests::find($request->id);
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['request'] = new RequestResource($requests);
        return response()->json($success, 200);
    }

    public function reSheduleRequest(Request $request)
    {
        $date = Carbon::parse($request->req_date);
        $day = Days::where('name',$date->isoFormat('dddd'))->first();
        $time = TimeSlot::where('days_id',$day->id)->where('time',$request->req_time)->where('is_active',1)->first();
        $requests = Requests::where('req_date',$request->req_date)->where('req_time',$request->req_time)->get();
        if($time['number_request'] <= count($requests)){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.not_availabel_time");
            return response()->json($response, 200);
        }

        Requests::where('id', $request->id)
                ->update(['req_date' => $request->req_date,'req_time' => $request->req_time]);
        $requests = Requests::find($request->id);
        if($requests->user_id){
            $user = User::find($requests->user_id);
            if($user->is_notified){
               // sendNotification($requests->user_id , $requests->id,trans('api.request_rescheduling'),trans('api.request_rescheduling').' : '.$requests->number_request);
            } 
        }
        $request['number_request'] = $requests->number_request;
        $setting = Setting::first();
        if($setting->email_req_rescheduling != null || $setting->email_req_rescheduling != ''){
            $recipients = explode(',', $setting->email_req_rescheduling);
            Mail::to($recipients)->send(new ReSheduleMail($request->all()));
        }

        $adminNotify = new Notification();
		$adminNotify->request_id = $requests->id ;
		$adminNotify->text = 'New rescheduling For Request #'.$requests->number_request ;
		$adminNotify->admin_read = 0;
        $adminNotify->save();

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.success_reshedule_request');
        return response()->json($success, 200);
    }

    public function cancelRequest(Request $request)
    {
        $requests = Requests::where('id', $request->id)
                            ->update(['status_id' => 8,'reason' => $request->reason]);
        $requests = Requests::find($request->id);
        if($requests){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = trans('api.success_cancel_request');
            $success['request'] = new RequestResource($requests);
            return response()->json($success, 200);
        }else{
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.not_found");
            return response()->json($response, 200);
        }
    }

    public function dropRequest(Request $request)
    {
        $requests = Requests::where('id', $request->id)
                                ->update(['user_deleted' => 1]);
        if($requests){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = trans('api.success_delete_request');
            return response()->json($success, 200);
        }else{
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.not_found");
            return response()->json($response, 200);
        }
    }

}
