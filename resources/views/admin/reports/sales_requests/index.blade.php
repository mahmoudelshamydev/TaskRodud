@extends('admin::index')
@section('content')

<section class="content-header">
    <h1>
        <span>Sales Reports</span>
    </h1>
</section>

<section class="content">
    @include('admin::partials.alerts')
    @include('admin::partials.exception')
    @include('admin::partials.toastr')
    @php
        $amountTotal = 0 ;

        foreach ($orders as $order  )
        {
            $amountTotal +=$order->amount;
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
                <form action="{{ route('admin.reports.sales_requests') }}" class="form-horizontal" pjax-container="" method="get">
                    <input type="hidden" name="search" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-body">
                                <div class="fields-group">
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
                            <th>Request Date</th>
                            <th>Request Time</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order  )
                            <tr>
                                <td>{{ $order->number_request }}</td>
                                <td>{{ $order->service->name_en }}</td>
                                <td>{{ $order->req_date }}</td>
                                <td>{{ $order->req_time }}</td>
                                <td>{{ number_format($order->amount,3) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th style="width: 86%;text-align: right;">Total amount</th>
                            <th>{{ number_format($amountTotal,3) }}</th>
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
    });

    $(".select2").select2({"allowClear":true,"placeholder":"Please Select"});
</script>
@endsection
