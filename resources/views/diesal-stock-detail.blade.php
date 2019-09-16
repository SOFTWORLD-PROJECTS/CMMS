@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/diesal-add.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 200px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            Stock -> DETAIL </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px;margin-top:10px;">
                                <span class="workorder-detail">Stock Details</span>
                            </div>
                            @if(count($errors) > 0)
                                <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="alert alert-danger">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                                    <span data-notify="message" style="margin-top:5px;">
                                        @foreach($errors->all() as $error)
                                                            <li><strong> {{$error}} </strong></li>
                                                        @endforeach </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" name="id" value="{{$stock->id}}">
                            <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Date</label>
                                                <div class="col-md-8">
                                                    <div class="input-group date date-picker margin-bottom-5"
                                                         data-date-format="yyyy-mm-dd">
                                                        <input type="text" class="form-control form-filter input-sm"
                                                               readonly
                                                               name="date" placeholder="Date"
                                                               value="{{$stock->create_date}}">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Supplier</label>
                                                <div class="col-md-8">
                                                    <input name="company" type="text" class="form-control"
                                                           value="{{$stock->supplier->name}}"
                                                           placeholder="Company">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Purchased</label>
                                                <div class="col-md-8">
                                                    <input name="purchased" type="number" class="form-control"
                                                           value="{{$stock->purchased}}"
                                                           placeholder="Purchased">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Actual</label>
                                                <div class="col-md-8">
                                                    <input name="actual" type="number" class="form-control"
                                                           value="{{$stock->actual}}"
                                                           placeholder="Actual">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Before Remaining Balance</label>
                                                <div class="col-md-8">
                                                    <input name="before_balance" type="number" class="form-control"
                                                           value="{{$stock->before_balance}}"
                                                           placeholder="Before Remaining Balance">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">After Balance</label>
                                                <div class="col-md-8">
                                                    <input name="after_balance" type="number" class="form-control"
                                                           value="{{$stock->after_balance}}"
                                                           placeholder="After Remaining Balance">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Before Remaining (cm)</label>
                                                <div class="col-md-8">
                                                    <input name="before_cm" type="number" class="form-control"
                                                           value="{{$stock->before_cm}}"
                                                           placeholder="Before Remaining (cm)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">After Remaining (cm)</label>
                                                <div class="col-md-8">
                                                    <input name="after_cm" type="number" class="form-control"
                                                           value="{{$stock->after_cm}}"
                                                           placeholder="After Remaining (cm)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-toolbar">
                            <a class="btn btn-sm dark"
                               style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                               href="{{ route('diesal', ['type' => 'stock']) }}">DISCARD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/diesal-stock-add.js') }}" type="text/javascript"></script>
@endsection
