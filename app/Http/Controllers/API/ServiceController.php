<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Service;

use App\Http\Resources\Service as ServiceResource;
use App\Http\Resources\TimeSlot as TimeSlotResource;

use App\Models\Days;
use App\Models\Requests;
use App\Models\TimeSlot;

class ServiceController extends Controller
{
    public function getServices()
    {
        $services = Service::Where('is_active',1)->orderBy('order', 'asc')->get();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['services'] = ServiceResource::collection($services);
        return response()->json($success, 200);
    }

    public function getServiceDetails(Request $request)
    {
        $service = Service::find($request->id);
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['service'] = new ServiceResource($service);
        return response()->json($success, 200);
    }

    public function getAvailabelTimes(Request $request)
    {
        $date = Carbon::parse($request->date);
        $day = $date->isoFormat('dddd');

        if($day == "Sunday" or $day == "الأحد"){
            $id_day = 1;
        }elseif($day == "Monday" or $day == "الاثنين"){
            $id_day = 2;

        }elseif($day == "Tuesday" or $day == "الثلاثاء"){
            $id_day = 3;

        }elseif($day == "Wednesday" or $day == "الأربعاء"){
            $id_day = 4;

        }elseif($day == "Thursday" or $day == "الخميس"){
            $id_day = 5;

        }elseif($day == "Friday" or $day == "الجمعة"){
            $id_day = 6;

        }else{
            $id_day = 7;

        }



        $day = Days::where('name',$date->isoFormat('dddd'))->first();
       // dd($date->isoFormat('dddd'));

        $times = TimeSlot::where('days_id',$id_day)->where('is_active',1)->get();

        foreach ($times as  $key => $time) {
            $requests = Requests::where('req_date',$request->date)->where('req_time',$time['time'])->get();
            if($time['number_request'] <= count($requests)){
                unset($times[$key]);
            }
        }

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['times'] = TimeSlotResource::collection($times);
        return response()->json($success, 200);
    }


    // public function getAvailabelTimes(Request $request)
    // {
    //     $date = Carbon::parse($request->date);
    //     $day = Days::where('name',$date->isoFormat('dddd'))->first();
    //     $times = TimeSlot::where('days_id',$day->id)->where('is_active',1)->get();
    //     foreach ($times as  $key => $time) {
    //         $requests = Requests::where('req_date',$request->date)->where('req_time',$time['time'])->get();
    //         if($time['number_request'] <= count($requests)){
    //             unset($times[$key]);
    //         }
    //     }
    //     $success['status'] = 'success';
    //     $success['api_status'] = 200;
    //     $success['message'] = '';
    //     $success['times'] = TimeSlotResource::collection($times);
    //     return response()->json($success, 200);
    // }
}
