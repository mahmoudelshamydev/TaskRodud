<?php

namespace App\Http\Controllers;

use App\Models\InvoiceTransactions;
use App\Models\PaymentStatus;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Requests;
use Illuminate\Support\Facades\Input;
use App\Models\Setting;

class PaymentController extends Controller
{
    public function getInfo(Request $request)
    {
        $invoice = Invoice::where('link', $request->token)->first();

        if(Carbon::parse($invoice->created_at)->diffInHours(Carbon::now()) >= 24){
            $invoice->payment_status_id  = 4 ;
            $invoice->update();
        }
        $order = Requests::find($invoice->request_id);
        $service_info = json_decode($order['service_info'], true);
        $settings = Setting::first();

        return view('payment.index')->with(compact('invoice','order','service_info','settings'));
    }

    public function payInvoice(Request $request)
    {
        $invoice = Invoice::where('link',$request->token)->first();
         if(config('app.PAYMENT_METHOD')=='hesabe'){
            $hesabeReturn =  $this->hesabePayment($invoice);
            if($hesabeReturn['payURL'])
            {
                return Redirect::to($hesabeReturn['payURL']);
            }
        }
        if(config('app.PAYMENT_METHOD')=='upayment') {
            $upaymentReturn =  $this->uPaymentPayment($invoice  );

            if($upaymentReturn['payURL']) {
                return Redirect::to($upaymentReturn['payURL']);
            }
        }
//         return Redirect::to(env('PAYMENT_METHOD')($invoice,$products,00000000000,$prices));
    }

    public function hesabePayment($invoice){
         $data['amount']=$invoice->amount - $invoice->discount;
        $data['orderId'] = $invoice->link;
        $data['paymentType'] = 1;
        $data['responseUrl'] =route('paySuccess',[$invoice->link,'s','hesabe']);
        $data['failureUrl'] = route('paySuccess',[$invoice->link,'f','hesabe']);
        return hesabe($data);
    }
    public function uPaymentPayment($invoice ){
        $products = [] ;
        $qtys = [] ;
        $prices = [] ;
        foreach(($invoice->fees) as $fee)
        {
            $service = Service::find($fee['Service']);

            $products[] = isset($service) ? $service->name_en :$fee['Service'] ;
            $qtys[] = $fee['Qts'];
            $prices[] = $fee['Amount'] ;

        }
        $data['amount']=$invoice->amount - $invoice->discount;
        $data['orderId'] = $invoice->link;
        $data['paymentType'] = 1;
        $data['payment_gateway'] = 'knet';
        $data['whitelabled'] = true;
        $data['CurrencyCode'] = 'KWD';
        $data['responseUrl'] =route('paySuccess',[$invoice->link,'s','upayment']);
        $data['failureUrl'] = route('paySuccess',[$invoice->link,'f','upayment']);
        $data['products'] = $products ;
        $data['qtys'] = $qtys;
        $data['prices'] = $prices;
        return upayment($data);
    }

    public function payReturn(Request $request , $token , $status)
    {
        $returns  = $request->all();
        $invoice = Invoice::where('link' , $token)->first();
         if( $request->payment == 'hesabe')
        {
            return $this->hesabeReturn($returns['data'],$invoice);
        }
         else if($request->payment == 'upayment')
         {
             return $this->upaymentReturn($returns,$invoice);
         }

    }

    public function hesabeReturn($result , $invoice)
    {
        $returns  = \App\Http\Controllers\API\HesabeCrypt::decrypt($result, config('app.HESABE_secretKey'), config('app.HESABE_ivKey'));
        $response = (json_decode($returns,true));
        $returns = ($response['response']);
        if(Carbon::parse($invoice->created_at)->diffInHours(Carbon::now()) >= 24){
            $invoice->payment_status_id  = 4 ;
            $invoice->update();
        }
        if($returns['resultCode']=='CAPTURED')
        {
            $invoice->payment_status_id  = 1 ;
            $requestData = Requests::find($invoice->request_id);
            $requestData->payment_status_id  = 1 ;
            $requestData->update();
            $invoice->update();
        }
        else
        {
            $invoice->payment_status_id  =3  ;
            $invoice->update();
        }
        $transaction =  InvoiceTransactions::create(
            [
                'invoice_id'=> $invoice->id,
                'payment_id'=> $returns['paymentId'],
                'result'=>$returns['resultCode'],
                'track_id'=>$returns['paymentToken'],
                'reference'=>$returns['paymentToken'],
                'track_id'=>$returns['paymentId'],
                'auth'=>$returns['paymentToken']
            ]
        );


        $order = Requests::find($invoice->request_id);
        $service_info = json_decode($order['service_info'], true);
        return view('payment.result')->with(compact('transaction','invoice','order','service_info'));

    }
    public function upaymentReturn($returns , $invoice)
    {
        if(Carbon::parse($invoice->created_at)->diffInHours(Carbon::now()) >= 24){
            $invoice->payment_status_id  = 4 ;
            $invoice->update();
        }
        if($returns['Result']=='CAPTURED')
        {
            $invoice->payment_status_id  = 1 ;
            $requestData = Requests::find($invoice->request_id);
            $requestData->payment_status_id  = 1 ;
            $requestData->update();
            $invoice->update();
        }
        else
        {
            $invoice->payment_status_id  =3  ;
            $invoice->update();
        }
        $transaction =  InvoiceTransactions::create(
            [
                'invoice_id'=> $invoice->id,
                'payment_id'=> $returns['PaymentID'],
                'result'=>$returns['Result'],
                'track_id'=>$returns['TranID'],
                'reference'=>$returns['Ref'],
                'track_id'=>$returns['TrackID'],
                'auth'=>$returns['Auth']
            ]
        );


        $order = Requests::find($invoice->request_id);
        $service_info = json_decode($order['service_info'], true);
        return view('payment.result')->with(compact('transaction','invoice','order','service_info'));

    }



}
