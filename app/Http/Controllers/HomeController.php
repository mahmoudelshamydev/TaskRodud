<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Requests;
use App\Models\Notification;
use App\Mail\RequestServiceMail;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function create()
    {
        return view('create');
    }
    public function orders(Request $request)
    {

        $order = new Requests();
        $order->user_id = Auth::Id();
        $order->location = $request->location;
        $order->size = $request->size;
        $order->weight = $request->weight;
        $order->pickup = $request->pickup;
        $order->delivery = $request->delivery;
        $order->status_id = 1;
        $order->save();

        $adminNotify = new Notification();
		$adminNotify->request_id = $order->id ;
		$adminNotify->text = 'New Request Placed #'.$order->id ;
		$adminNotify->admin_read = 0;
		$adminNotify->save();
		
		        Mail::to("mmmsn2007@yahoo.com")->send(new RequestServiceMail($order));

        // $requests = Requests::where("user_id",Auth::Id())->orderBy("id","desc")->with('status')->get();
        // //dd($requests);
        // return view('orders', compact('requests'));
        return redirect()->route('my_orders');
    }
    public function my_orders()
    {

        
        $requests = Requests::where("user_id",Auth::Id())->orderBy("id","desc")->with('status')->get();
        //dd($requests);
        return view('orders', compact('requests'));

    }
}
