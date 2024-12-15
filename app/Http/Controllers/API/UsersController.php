<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomMail;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Addresse;
use App\Models\Car;
use App\Models\GuestDevice;
use App\Models\UserNotifications;

use App\Http\Resources\User as UserResource;
use App\Http\Resources\Car as CarResource;
use App\Http\Resources\Addresse as AddresseResource;
use App\Http\Resources\UserNotification as NotificationResource;
use Illuminate\Support\Str;


class UsersController extends Controller
{
    //create user
    public function signup(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'phone_prefix' => 'required',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password'

        ]);

        if($validator->fails()){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validator->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);
        }

        // $guest = GuestDevice::where('device_id',$request->device_id)->first();
        // if($guest){
        //     GuestDevice::where('device_id', $request->device_id)->delete();
        // }

        $code = 'EN' . Carbon::now() . $request->name;

        $activation_code = substr(preg_replace('/[^A-Za-z0-9\-]/', '', Hash::make($code)), 0, 6);

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'phone_prefix' => $request->phone_prefix,
            'code' => $activation_code,
            'otp_at' => Carbon::now(),
            'device_token' => "",
            'device_platform' => "",
            'device_id' => ""
        ]);
        //dd($user);
        // sendsms($user,$activation_code,"activation%20account");
        
        Mail::to($request->email)->send(new WelcomMail($user));

        if($user){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['user_id'] = $user->id;
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = trans("api.registrat");
            return response()->json($success, 200);
        }
    }

    public function getProfil()
    {
        $user = Auth::user();
        if($user){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['user'] = new UserResource($user);
            return response()->json($success, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'phone_prefix' => 'required',
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.Auth::user()->id,],
            'phone' => ['required', 'numeric','unique:users,phone,'.Auth::user()->id,]
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validate->errors();
            $response['message'] =trans("validation errors");
            return response()->json($response, 200);
        }

        if (Auth::user()) {
            User::updateOrCreate(['id' => Auth::id()], [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'phone_prefix' => $request->phone_prefix
            ]);
        } else {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.Unauthorized");
            return response()->json($response, 200);
        }

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.success_update');
        return response()->json($success, 200);
    }

    public function notifications()
    {
        $user = Auth::user();
        if($user){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['notifications'] = NotificationResource::collection($user->notifications);
            $success['count_not_read_notifications'] = count($user->notifications->where('is_read',0));
            return response()->json($success, 200);
        }
    }

    public function readNotification(Request $request){
        UserNotifications::where('id', $request->id)
                            ->where('user_id', Auth::Id())
                            ->update(['is_read' => 1]);

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        return response()->json($success, 200);
    }

    public function notificationSettings()
    {
        $user = Auth::user();

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['is_notified'] = $user->is_notified;
        return response()->json($success, 200);
    }

    public function updateNotificationSettings(Request $request)
    {
        $user = Auth::user();
        $user->is_notified = $request->value;
        $user->update();

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['is_notified'] = $user->is_notified;
        return response()->json($success, 200);
    }

    public function getCars()
    {
        $user = Auth::user();
        if($user){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['cars'] = CarResource::collection($user->cars->sortByDesc('id'));
            return response()->json($success, 200);
        }
    }

    public function carDetails(Request $request)
    {
        $car = Car::find($request->id);
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['Car'] = new CarResource($car);
        return response()->json($success, 200);
    }

    public function saveCar(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'make_id' => ['required'],
            'model_id' => ['required'],
            'year' => ['required']
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validate->errors();
            $response['message'] =trans("validation errors");
            return response()->json($response, 200);
        }

        if($request->is_default == 1){
            Car::where('user_id', Auth::Id())
            ->update(['is_default' => 0]);
        }

        $car = Car::updateOrCreate(['id' => $request->id], [
            'name' => $request->name,
            'model_id' => $request->model_id,
            'make_id' => $request->make_id,
            'year' => $request->year,
            'license_plate' => $request->license_plate,
            'user_id' => Auth::Id(),
            'is_default' => $request->is_default
        ]);
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.success_save_car');
        $success['car'] = new CarResource($car);
        return response()->json($success, 200);

    }

    public function deleteCar(Request $request)
    {
        Car::where('id', $request->id)->where('user_id',  Auth::Id())->delete();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.success_delete_car');
        return response()->json($success, 200);
    }

    public function getAddresses()
    {
        $user = Auth::user();
        if($user){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['addresses'] = AddresseResource::collection($user->addresses->sortByDesc('id'));
            return response()->json($success, 200);
        }
    }

    public function addressDetails(Request $request)
    {

        $address = Addresse::find($request->id);
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['address'] = new AddresseResource($address);
        return response()->json($success, 200);

    }

    public function saveAddress(Request $request)
    {
        $rules = [
            'addresse_name' => 'required|string',
            'area_id' => 'required',
            'street' => 'required',
            'block' => 'required',
            'building' => 'required'
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validate->errors();
            $response['message'] = "validation errors";
            return response()->json($response, 200);
        }

           if($request->is_default == 1){
            Addresse::where('user_id', Auth::Id())
            ->update(['is_default' => 0]);
        }
        $address = Addresse::updateOrCreate(['id' => $request->id], [
            'addresse_name' => $request->addresse_name,
            'area_id' => $request->area_id,
            'street' => $request->street,
            'block' => $request->block,
            'avenue' => $request->avenue,
            'building' => $request->building,
            'extra_info' => $request->extra_info,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'user_id' => Auth::Id(),
            'is_default'=>$request->is_default
        ]);
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.success_save_address');
        $success['address'] = new AddresseResource($address);
        return response()->json($success, 200);
    }

    public function deleteAddress(Request $request)
    {
        Addresse::where('id', $request->id)->where('user_id',  Auth::Id())->delete();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.success_delete_address');
        return response()->json($success, 200);
    }

}
