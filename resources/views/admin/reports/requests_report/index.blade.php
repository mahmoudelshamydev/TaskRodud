@extends('admin::index')
@section('content')

<section class="content-header">
    <h1>
        <span>Requests Reports</span>
    </h1>
</section>

<section class="content">
    @include('admin::partials.alerts')
    @include('admin::partials.exception')
    @include('admin::partials.toastr')
    @php
        $totalAmount = 0 ;

        foreach ($orders as $order)
        {
            $totalAmount +=$order->amount;
        }
    @endphp
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <div class="btn-group" style="margin-right: 10px" data-toggle="buttons">
                    <label class="btn btn-sm btn-dropbox filter-btn " title="Filter">
                        <input type="checkbox"><i class="fa fa-filter"></i><span class="hidden-xs">&nbsp;&nbsp;Filter</span>
                    </label>
                </div>
            </div>
            <div class="box-header with-border {{ $request->has('search') ? '' : 'hide' }}" id="filter-box">
                <form action="{{ route('admin.reports.requests_report') }}" class="form-horizontal" pjax-container="" method="get">
                    <input type="hidden" name="search" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="fields-group">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Service</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="service_id" name="service_id" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    @foreach ($services as $service)
                                                        <option {{ $request->has('service_id') && $request->service_id == $service->id ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->name_en }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Users</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="user_id" name="user_id" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    @foreach ($users as $user)
                                                        <option {{ $request->has('user_id') && $request->user_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Car Makes</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="make_id" name="make_id" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    @foreach ($car_makes as $car_make)
                                                        <option {{ $request->has('make_id') && $request->make_id == $car_make->id ? 'selected' : '' }} value="{{ $car_make->id }}">{{ $car_make->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Car Models</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="model_id" name="model_id" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    @foreach ($car_models as $car_model)
                                                        <option {{ $request->has('model_id') && $request->model_id == $car_model->id ? 'selected' : '' }} value="{{ $car_model->id }}">{{ $car_model->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> From Car Year</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control datepicker_year" id="from_car_year" placeholder="From Car Year" name="from_car_year" value="{{ $request->from_car_year }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> To Car Year</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control datepicker_year" id="to_car_year" placeholder="To Car Year" name="to_car_year" value="{{  $request->to_car_year }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Request Status</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="status_id" name="status_id" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    @foreach ($orderStatus as $status)
                                                        <option {{ $request->has('status_id') && $request->status_id == $status->id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->name_en }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Payment Status</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="payment_status_id" name="payment_status_id" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    @foreach ($payments_status as $payment_status)
                                                        <option {{ $request->has('payment_status_id') && $request->payment_status_id == $payment_status->id ? 'selected' : '' }} value="{{ $payment_status->id }}">{{ $payment_status->name_en }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> From Date</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control datepicker" id="from_date" placeholder="From Date" name="from_date" value="{{ $request->from_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> To Date</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <input class="form-control datepicker" id="to_date" placeholder="To Date" name="to_date" value="{{  $request->to_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"> Discount</label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-pencil"></i>
                                                </div>
                                                <select class="form-control select2" id="discount" name="discount" style="width: 100%;">
                                                    <option value="">Please select</option>
                                                    <option {{ $request->has('discount') && $request->discount == 1 ? 'selected' : '' }} value="1">YES</option>
                                                    <option {{ $request->has('discount') && $request->discount == 0 ? 'selected' : '' }} value="0">NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="btn-group pull-left">
                                        <button class="btn btn-info submit btn-sm"><i class="fa fa-search"></i>&nbsp;&nbsp;Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th>Request Number</th>
                            <th>Service Name</th>
                            <th>Customer Name</th>
                            <th>Car Make</th>
                            <th>Car Model</th>
                            <th>Car Year</th>
                            <th>Request Date</th>
                            <th>Request Status</th>
                            <th>Payment Status</th>
                            <th>Discount</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->number_request }}</td>
                                <td>{{ $order->service->name_en }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->make->name_en }}</td>
                                <td>{{ $order->model->name_en }}</td>
                                <td>{{ $order->car_years }}</td>
                                <td>{{ $order->req_date }}</td>
                                <td>{{ $order->status_id?$order->status->name_en:'-' }}</td>
                                <td>{{ $order->payment_status_id?$order->paymentStatus->name_en:'-' }}</td>
                                <td>{{ $order->discount? 'Yes': 'No' }}</td>
                                <td>{{ number_format($order->amount,3) }}</td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>

                <table style="" class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th style="width: 87%;text-align: right;">Total amount</th>
                            <th>{{ number_format($totalAmount,3) }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
            </div>
        </div>


    </div>
</section>

<script src="{{ asset('vendor/laravel-admin/AdminLTE/plugins/select2/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.filter-btn').click(function(){
            if($('#filter-box').hasClass('hide')){
                $('#filter-box').removeClass('hide')
            }else{
                $('#filter-box').addClass('hide');
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({format: 'yyyy-mm-d'});
        $('.datepicker_year').datepicker({format: 'yyyy',
                                            viewMode: "years",
                                            minViewMode: "years"});
    });

    $(".select2").select2({"allowClear":true,"placeholder":"Please Select"});
</script>
@endsection
