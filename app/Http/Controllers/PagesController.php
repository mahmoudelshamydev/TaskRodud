<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Contact;
use App\Mail\ContactUsMail;
use Mail;

use function Psy\bin;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::where('slug', $request->slug)->first();
        $setting = Setting::first();
        return view('Pages.page')->with(['page'=>$page,'setting'=>$setting ]);

    }

    public function contactus(Request $request)
    {
        $setting = Setting::first();
        return view('Pages.contactUs')->with(['setting'=>$setting]);

    }

    public function sendContactRequest(Request $request){
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
        return back();
    }
    
    
}
