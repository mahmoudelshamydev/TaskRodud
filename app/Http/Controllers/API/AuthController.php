<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\User;
use App\Models\Setting;
use App\Models\GuestDevice;

use App\Mail\WelcomMail;
use Mail;
use Auth;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validator->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);
        }

        $user = User::where('email', $request->email)->first();
        if(!$user){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.Invalid Email");
            return response()->json($response, 200);
        }

        $credentials = array(
            'email' => $request->email,
            'password' => ($request->password),
        );

        if(!Auth::guard('web')->attempt($credentials)){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.Wrong Password");
            return response()->json($response, 200);
        }

        // if($user['is_active'] == 0){
        //     $response['status'] = 'error';
        //     $response['api_status'] = 400;
        //     $response['message'] = trans("api.Inactive");
        //     $response['is_active'] = $user['is_active'];
        //     $response['is_blocked'] = $user['is_blocked'];
        //     // $response['token'] = $user->createToken('token')->accessToken;
        //     return response()->json($response, 200);
        // }

        // if($user['is_blocked'] == 1){
        //     $response['status'] = 'error';
        //     $response['api_status'] = 400;
        //     $response['message'] = trans("api.blocked");
        //     $response['is_active'] = $user['is_active'];
        //     $response['is_blocked'] = $user['is_blocked'];
        //     // $response['token'] = $user->createToken('token')->accessToken;
        //     return response()->json($response, 200);
        // }

        $user = $request->user();

     

        $success['status'] = 'success';
        $success['user_id'] = $user->id;
        $success['is_active'] = $user->is_active;
        $success['message'] = trans('api.login');
        $success['token'] =  $user->createToken('token')->accessToken;
        $success['api_status'] = 200;
        return response()->json($success, 200);
    }

    public function resendCode(request $request)
    {

        $user = User::where('phone',$request->phone)->first();
        
        if($user){
            $code = 'EN' . Carbon::now() . $user->name;
            $user->code = substr(preg_replace('/[^A-Za-z0-9\-]/', '', Hash::make($code)), 0, 6);
            $user->otp_at = Carbon::now();
            $user->update();
            sendsms($user,$user->code,"activation%20account");

            Mail::to($user->email)->send(new WelcomMail($user));
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = trans('the code has been sent');
            return response()->json($success, 200);
        }else{
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.Unauthorized");
            return response()->json($response, 200);
        }
    }

    public function activateAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required'
        ]);

        if($validator->fails()){
                                                                                                        
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validator->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);

        }

        $user = Auth::user();

        if($user){
            $seting = Setting::find(1);
            if(Carbon::parse($user['otp_at'])->diffInHours(Carbon::now()) >= $seting->nbr_hour_activ_code){
                $response['status'] = 'error';
                $response['api_status'] = 400;
                $response['message'] = trans("api.expired_code");
                return response()->json($response, 200);
            }
            if($user->code == $request->code){
                $user->is_active = 1;
                $user->code = '';
                $user->otp_at = null;
                $user->email_verified_at = Carbon::now();
                $user->update();
                $success['status'] = 'success';
                $success['api_status'] = 200;
                $success['message'] = trans('api.active_account');
                return response()->json($success, 200);
            }else{
                $response['status'] = 'error';
                $response['api_status'] = 400;
                $response['message'] = trans("api.not_found_code");
                return response()->json($response, 200);
            }
        }else{
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans("api.Unauthorized");
            return response()->json($response, 200);
        }
    }


    public function logout(Request $request)
    {
        $user = auth()->user()->token();
        $user->revoke();

        $response['status'] = 'success';
        $response['api_status'] = 200;
        $response['message'] = trans("logged out");
        $response['data'] = [];
        return response()->json($response, 200);
    }
    public function storeGuestDevice(Request  $request)
    {
        $guest = GuestDevice::where('device_id',$request->device_id)->first();
        if($guest){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = trans('api.existe_guest_device');
            return response()->json($success, 200);
        }
        $user = User::where('device_id',$request->device_id)->first();
        if($user){
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['message'] = trans('api.existe_guest_device');
            return response()->json($success, 200);
        }
        GuestDevice::create(
            [
                'device_token'=>$request->device_token,
                'device_id'=>$request->device_id
            ]
        );

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.added_guest_device');
        return response()->json($success, 200);
    }

}
