@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/workorder-add.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .custom-fileinput {
            display: inline-block;
            margin-bottom: 9px;
        }
        .custom-fileinput .btn {
            vertical-align: middle;
        }
    </style>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 250px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;"> Work Order ->
                            ADD </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('workorder.create')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12" style="padding-left: 50px;padding-right:50px;margin-top:10px;">
                                    <span class="workorder-detail">Work Order Detail</span>
                                    <button type="submit" class="btn btn-danger btn-sm btn-circle pull-right"
                                            style="margin-right:10px;width: 100px;">SAVE
                                    </button>
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
                                <div class="col-md-12" style="padding-left: 50px;padding-right:50px;margin-top:20px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Date
                                                        / Time</label>
                                                    <div class="col-md-7">
                                                        <div class="input-group date form_datetime">
                                                            <input type="text" readonly class="form-control"
                                                                   placeholder="Date / Time"
                                                                   name="create_time" value="{{old('create_time')}}">
                                                            <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Work
                                                        Order No</label>
                                                    <div class="col-md-7">
                                                        <input name="wo_no" type="text" class="form-control"
                                                               placeholder="Work Order No" value="{{$nextNumber}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold"
                                                           style="margin-top:7px;">Type</label>
                                                    <div class="col-md-7">
                                                        <select name="type" class="form-control">
                                                            @foreach($types as $type)
                                                                <option value="{{ $type->id }}"
                                                                        @if(old('type') == $type->id) selected @endif>{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold"
                                                           style="margin-top:7px;">Model</label>
                                                    <div class="col-md-7">
                                                        <select name="model" class="form-control">
                                                            @foreach($models as $model)
                                                                <option value="{{ $model->id }}"
                                                                        @if(old('model') == $model->id) selected @endif>{{ $model->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Registration
                                                        No</label>
                                                    <div class="col-md-7">
                                                        <input name="reg_no" type="text" class="form-control"
                                                               placeholder="Registration No" value="{{old('reg_no')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Assign
                                                        To</label>
                                                    <div class="col-md-7">
                                                        <input name="assign_to" type="text" class="form-control"
                                                               value="{{old('assign_to')}}"
                                                               placeholder="Assign To">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold"
                                                           style="margin-top:7px;">Title</label>
                                                    <div class="col-md-7">
                                                        <input name="title" type="text" class="form-control"
                                                               placeholder="Title" value="{{old('title')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Estimation
                                                        Completion Time</label>
                                                    <div class="col-md-7">
                                                        <div class="input-group date date-picker margin-bottom-5"
                                                             data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm"
                                                                   readonly
                                                                   name="estimate_time" placeholder="Estimate Time">
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
                                                        <div class="col-md-6">
                                                            <div class="radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="service_type" value="self"
                                                                           @if(old('service_type') == 'self' || !old('service_type')) checked @endif ><b> Self Service </b></label>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="service_type" value="vendor"  @if(old('service_type') == 'vendor') checked @endif>
                                                                <b>Vendor Service </b>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-left: 50px;padding-right:50px;">
                                    <hr style="border-top: 1px solid #626365;margin-top: 10px; margin-bottom: 10px; ">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="parts-use">Parts Use</span>
                                            <a id="add-parts-use" class="btn btn-danger btn-sm btn-circle pull-right"
                                                    style="margin-right:10px;width: 100px;">ADD
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-scrollable"  style="min-height: 100px;">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr id="parts-use-self-header" class="@if(old('service_type') == 'vendor') display-hide @endif" >
                                                        <th width="5%" class="text-center">#</th>
                                                        <th width="10%" class="text-center">IRF</th>
                                                        <th width="10%" class="text-center"> Part No</th>
                                                        <th width="15%" class="text-center"> Part Name</th>
                                                        <th width="10%" class="text-center"> Required QTY</th>
                                                        <th width="10%" class="text-center"> Order QTY</th>
                                                        <th width="10%" class="text-center"> U. Price</th>
                                                        <th width="10%" class="text-center"> Amount</th>
                                                        <th width="10%" class="text-center"> Action</th>
                                                    </tr>
                                                    <tr id="parts-use-vendor-header" class="@if(old('service_type') == 'self' || !old('service_type')) display-hide @endif">
                                                        <th width="5%" class="text-center">#</th>
                                                        <th width="8%" class="text-center">IRF</th>
                                                        <th width="8%" class="text-center"> Part No</th>
                                                        <th width="15%" class="text-center"> Part Name</th>
                                                        <th width="10%" class="text-center"> Required QTY</th>
                                                        <th width="10%" class="text-center"> On hand QTY</th>
                                                        <th width="10%" class="text-center"> Order QTY</th>
                                                        <th width="8%" class="text-center"> U. Price</th>
                                                        <th width="8%" class="text-center"> Amount</th>
                                                        <th width="8%" class="text-center"> Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="parts-use">Service</span>
                                            <a class="btn btn-danger btn-sm btn-circle pull-right"
                                                    style="margin-right:10px;width: 100px;" id="add-service">ADD
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-scrollable"   style="min-height: 100px;">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr id="service-self-header" class="@if(old('service_type') == 'vendor') display-hide @endif" >
                                                        <th width="10%">#</th>
                                                        <th width="20%"> Service No</th>
                                                        <th width="20%"> Service Name</th>
                                                        <th width="15%"> Assign To</th>
                                                        <th width="15%"> Action</th>
                                                    </tr>
                                                    <tr  id="service-vendor-header" class="@if(old('service_type') == 'self' || !old('service_type')) display-hide @endif" >
                                                        <th width="10%">#</th>
                                                        <th width="20%">RFS</th>
                                                        <th width="15%"> Service No</th>
                                                        <th width="15%"> Service Name</th>
                                                        <th width="15%"> Vendor</th>
                                                        <th width="15%"> Amount</th>
                                                        <th width="10%"> Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-left: 50px;padding-right:50px;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                <span class="parts-use"
                                                      style="margin-right: 25px;">Upload Picture</span>
                                                    <div class="custom-fileinput">
                                                        <span class="btn btn-default btn-file btn-circle btn-sm "
                                                              style="width: 100px;">
                                                            <span class="fileinput-new"> Browse </span>
                                                            <input type="file" name="..."  id="upload-pic"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 15px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 bold" style="margin-top:7px;">Remark</label>
                                                    <div class="col-md-7">
                                                    <textarea name="remark" type="text" class="form-control"
                                                              placeholder="Remark" rows="4"></textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" id="remark-show" class="btn btn-outline"
                                                           style="border: 1px solid #dcddde; padding: 5px; border-radius: 5px !important;">
                                                            <img src="{{asset('assets/img/document.jpg')}}"
                                                                 style="max-width: 40px;">
                                                        </a>
                                                        <a id="remark-save" class="btn btn-danger btn-xs btn-circle pull-right"
                                                                style="margin-right:10px;width: 80px;margin-top:15px;">SAVE
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="action-toolbar">
                                <a class="btn btn-sm dark"
                                   style="width: 100px;border-radius:5px !important;"
                                   href="{{ route('workorder') }}">DISCARD</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{ asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/workorder-add.js') }}" type="text/javascript"></script>
@endsection
