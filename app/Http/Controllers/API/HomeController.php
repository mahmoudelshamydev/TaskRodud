<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactUsMail;
use Mail;

use App\Models\Area;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Contact;

use App\Http\Resources\Area as AreaResource;
use App\Http\Resources\Setting as SettingResource;
use App\Http\Resources\Faq as FaqResource;
use App\Http\Resources\Page as PageResource;
use App\Http\Resources\Banner as BannerResource;
class HomeController extends Controller
{
    public function getAreas()
    {
        $areas = Area::all();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['areas'] = AreaResource::collection($areas);
        return response()->json($success, 200);
    }

    public function getBanners(){
        $banners = Banner::all();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['banners'] = BannerResource::collection($banners);
        return response()->json($success, 200);
    }

    public function settings()
    {

        $settings = Setting::first();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['settings'] = new SettingResource($settings);
        return response()->json($success, 200);

    }

    public function storeContactUs(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'message' => ['required' ],
        ]);

        if ($validate->fails()) {
            $response['status'] = 'error';
            $response['api_status'] = 400;
            $response['vaildation_message'] = $validate->errors();
            $response['message'] =trans("validation errors");
            return response()->json($response, 417);
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        $setting = Setting::first();
        if($setting->email_contact_us != null || $setting->email_contact_us != ''){
            $recipients = explode(',', $setting->email_contact_us);
            Mail::to($recipients)->send(new ContactUsMail($request->all()));
        }

        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = trans('api.contact_us_success_message');
        return response()->json($success, 200);
    }

    public function faqs()
    {
        $faq = Faq::all();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['faq'] = FaqResource::collection($faq);
        return response()->json($success, 200);
    }

    public function getPage(Request $request)
    {

        $page = Page::where('slug', $request->slug)->first();
        $success['status'] = 'success';
        $success['api_status'] = 200;
        $success['message'] = '';
        $success['page'] = new PageResource($page);
        return response()->json($success, 200);

    }

}
