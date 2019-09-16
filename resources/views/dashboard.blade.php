@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/dashboard.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper">
        <div class="page-content-body">
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label col-md-4 text-right" style="margin-top: 5px;"><b>Date
                                From</b></label>
                        <div class="col-md-8 no-padding">
                            <div class="input-group date date-picker"
                                 data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control date-input" readonly>
                                <span class="input-group-btn">
                                <button class="btn default date-btn" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no-padding">
                    <div class="form-group">
                        <div class="checkbox text-right" style="margin-top: 5px; width: 12%; float: left;">
                            <label><input type="checkbox">&nbsp;<b>To</b>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group date date-picker"
                                 data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control date-input" readonly>
                                <span class="input-group-btn">
                                    <button class="btn default date-btn" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-sm btn-primary btn-circle filter-btn purple-sharp"
                                    style="width: 90px">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 5px; margin-left: 10px;">
                <div class="col-md-6 no-padding">
                    <div class="portlet light  bordered box-shadow">
                        <div class="portlet-body">
                            <span class="spent_analysis">Spent Analysis</span>
                            <div id="morris_chart_3" style="margin-top: 15px;height:290px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 no-padding" style=" margin-left: 5%;">
                    <div class="portlet light  bordered box-shadow">
                        <div class="portlet-title" style=" margin-bottom: 5px;">
                            <div class="caption">
                                <span class="caption-subject bold" style="color: black"> Top Spent</span>
                            </div>
                        </div>
                        <div class="portlet-body no-padding">
                            <div style="width: 100%; height: 260px;">
                                <div class="table-scrollable table-scrollable-borderless"
                                     style=" margin-top: 0px !important;">
                                    <table class="table table-hover table-light table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width:20%;"> Type</th>
                                            <th class="text-center" style="width:20%;"> Brand</th>
                                            <th class="text-center" style="width:40%;"> Registration No</th>
                                            <th class="text-center" style="width:20%;"> Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 15px; margin-left:10px;">
                <div class="col-md-7 no-padding">
                    <div class="portlet light  bordered box-shadow">
                        <div class="portlet-body">
                            <div class="tabbable-custom " style="height: 260px;">
                                <ul class="nav nav-tabs ">
                                    <li class="active">
                                        <a href="#upcoming" data-toggle="tab"> Upcoming P.M </a>
                                    </li>
                                    <li>
                                        <a href="#renewal" data-toggle="tab"> Renewal </a>
                                    </li>
                                    <li>
                                        <a href="#work_order" data-toggle="tab"> Work Order </a>
                                    </li>
                                </ul>
                                <div class="tab-content no-padding" style=" height: 215px;">
                                    <div class="tab-pane active" id="upcoming" style="padding-top:5px">
                                        <table class="table table-hover table-light table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width:10%;"> #</th>
                                                <th class="text-center" style="width:20%;">Date Of Service</th>
                                                <th class="text-center" style="width:15%;">Type</th>
                                                <th class="text-center" style="width:20%;">Description</th>
                                                <th class="text-center" style="width:20%;">Registration No</th>
                                                <th class="text-center" style="width:15%;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="renewal" style="padding-top:5px">
                                        <table class="table table-hover table-light table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width:10%;"> #</th>
                                                <th class="text-center" style="width:20%;">Date Of Service</th>
                                                <th class="text-center" style="width:15%;">Type</th>
                                                <th class="text-center" style="width:20%;">Description</th>
                                                <th class="text-center" style="width:20%;">Registration No</th>
                                                <th class="text-center" style="width:15%;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="work_order" style="padding-top:5px">
                                        <table class="table table-hover table-light table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width:10%;"> #</th>
                                                <th class="text-center" style="width:20%;">Date Of Service</th>
                                                <th class="text-center" style="width:15%;">Type</th>
                                                <th class="text-center" style="width:20%;">Description</th>
                                                <th class="text-center" style="width:20%;">Registration No</th>
                                                <th class="text-center" style="width:15%;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no-padding" style=" margin-left: 5%;">
                    <div class="portlet light  bordered box-shadow">
                        <div class="portlet-title" style=" margin-bottom: 5px;">
                            <div class="caption">
                                <span class="caption-subject bold" style="color: black"> Spent Summary</span>
                            </div>
                        </div>
                        <div class="portlet-body no-padding">
                            <div style="width: 100%; height: 230px;">
                                <div class="table-scrollable table-scrollable-borderless"
                                     style=" margin-top: 0px !important;">
                                    <table class="table table-hover table-light table-striped">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width:50%;"> Type</th>
                                            <th class="text-center" style="width:50%;"> Ratio</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/plugins/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/morris/morris.min.js' ) }}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/morris/raphael-min.js' ) }}" type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/dashboard.js') }}" type="text/javascript"></script>
@endsection
