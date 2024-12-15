@extends('layouts.app_payment')
@section('content')
        <section class="wow slideInUp home-content-section-wrap ">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="left-content">
                            <h1>{{ __('website.payment_step')}} </h1>
                            <div class="receipt-content-hold">
                                <div class="row">
                                    <div class="col-md-2 col-sm-12">
                                        <div class="receipt-con-hold"> <img src="/img/receipt_icon.png"> </div>
                                    </div>
                                    <div class="col-md-10 col-sm-12">
                                        <div class="receipt-content">
                                            <div class="receipt-head">
                                                <h2> {{ __('website.service_info')}} </h2>
                                                <p> {{ $order['make']['name'] }} - {{ $order['model']['name'] }} - {{ $order['car_years'] }} - {{ $service_info['request_details'] }}</p>
                                            </div>
                                            <div class="receipt-body">
                                                <h2> {{ __('website.invoice')}} </h2>
                                                <table width="100%" border="0" cellspacing="5" cellpadding="5" class="payment-table">
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%">{{ __('website.service_package')}}</td>
                                                            <td width="50%">{{ number_format($invoice['amount'],3) }} KD</td>
                                                        </tr>
                                                        @foreach ($invoice['fees'] as $invoice_fees  )
                                                            <tr>
                                                                <td>{{ $invoice_fees['Qts'] }}x  {{ $invoice_fees['Service'] }}</td>
                                                                <td>{{ number_format($invoice_fees['Amount'],3) }} KD</td>
                                                            </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>{{ __('website.discount')}}</td>
                                                            <td>{{ number_format($invoice['discount'],3) }} KD</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('website.payment_methoud')}}</td>
                                                            <td>{{ $order['payment']['name'] }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="total-part">
                                                    <div class="row">
                                                        <div class="col-md-6"> {{ __('website.total')}} </div>
                                                        <div class="col-md-6"> {{ number_format($invoice['amount']-$invoice['discount'],3) }} KD </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 ">
                        <div class="right-content">
                             @if($invoice->payment_id == 2)
                             @if($invoice->payment_status_id == 4)
                                <a href="#" class="payment-button"> {{ __('website.expired')}} </a>
                            @else
                                <a href="{{ route('pay',$invoice->link) }}" class="payment-button"> {{ __('website.pay_now')}} </a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
