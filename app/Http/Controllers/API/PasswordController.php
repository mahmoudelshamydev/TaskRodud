<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\PasswordResets;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPassword;
use App\Mail\WelcomMail;
use App\Mail\SmsMail;
use App\Mail\ChangePassword;
use Auth;
class PasswordController extends Controller
{
    public function sendPasswordResetCode(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric'
        ]);

        if($validator->fails())
		{
			$response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validator->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);
        }

        $user = User::where('phone', $request->phone)->first();

        if ( !$user ){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.not_found_user');
            return response()->json($response, 200);
        }

        $code = 'EN' . Carbon::now() . $user->name;
        
        $code_password = rand(10000,50000);
        
        $user->update([
            'otp' => $code_password,
            // 'code' => $code_password,
        ]);

        PasswordResets::where('email', $user->email)->delete();
        //create a new token to be sent to the user.
        $PasswordResets = new PasswordResets();
        $PasswordResets->email = $user->email;
        $PasswordResets->token = str_random(60);
        $PasswordResets->created_at = Carbon::now();
		$PasswordResets->save();

        Mail::to($user->email)->send(new SmsMail($user));
        $success['message'] = trans('api.send_sms');
        $success['message'] = trans('api.send_sms');
        $success['status'] = 'success';
        $success['api_status'] = 200;
        sendsms($user,$code_password,"verification");
        //dd($user);

        return response()->json($success, 200);
        /**
        * Send email to the email above with a link to your password reset
        * something like url('password-reset/' . $token)
        * Sending email varies according to your Laravel version. Very easy to implement
        */
    }

    public function verifyPasswordCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|'
        ]);
        if($validator->fails()){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validator->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);
        }
        $user = User::where('otp', $request->code)->first();
        //dd($user);
        if(!$user){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.not_found_code');
            return response()->json($response, 200);
        }else{
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = trans('api.verified_code');
            return response()->json($success, 200);
        }
    }

    public function changePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
			'password' => 'required|string|min:8|confirmed',
		]);

        if($validate->fails())
		{
			$response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validate->errors();
            $response['message'] = trans("validation errors");
            return response()->json($response, 200);
		}
        $user  = Auth::user();

        if(!$user)
        {
			$response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.Unauthorized');
            return response()->json($response, 200);
        }

        $user->update([
            'password'=>bcrypt($request->password),
            'otp' => ''
        ]);

        DB::table('password_resets')->where('email', $user->email)->delete();

        $user  = User::where('email',$user->email)->first();
        // Mail::to($user->email)->send(new ChangePassword($user));
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['token'] =  $user->createToken('token')->accessToken;
        $success['message'] = trans('api.updated_password');
        return response()->json($success, 200);
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if($validator->fails()){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validator->errors();
            $response['message'] = "validation errors";
            return response()->json($response, 200);
        }

        $user  = Auth::user();

        if(!$user)
        {
			$response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.not_found_user');
            return response()->json($response, 200);
        }

        if($user->code != $request->code){
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['message'] = trans('api.not_found_code');
            return response()->json($response, 200);
        }else{
            $user->update([
                'password'=>bcrypt($request->password),
                'code' => ''
            ]);
            DB::table('password_resets')->where('email', $user->email)->delete();

            $user  = User::where('email',$user->email)->first();
            // Mail::to($user->email)->send(new ChangePassword($user));
            $success['status'] = 'success';
            $success['api_status'] = 200;
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = trans('api.updated_password');
            return response()->json($success, 200);
        }
    }
}
