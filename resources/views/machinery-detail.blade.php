@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/machinery-detail.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 180px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important; border-bo"> Listing ->
                            VIEW </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px;margin-top:10px;">
                                <span class="machine-particular">Machine Particular</span>
                            </div>
                            <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Type</label>
                                                <div class="col-md-8">
                                                    <input name="type_name" type="text" class="form-control"
                                                           placeholder="Type" value="{{$machinery->type_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Brand</label>
                                                <div class="col-md-8">
                                                    <input name="brand_name" type="text" class="form-control"
                                                           placeholder="Brand" value="{{$machinery->brand_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Model</label>
                                                <div class="col-md-8">
                                                    <input name="model_name" type="text" class="form-control"
                                                           placeholder="Model" value="{{$machinery->model_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold"
                                                       style="margin-top:7px;">Company</label>
                                                <div class="col-md-8">
                                                    <input name="company_name" type="text" class="form-control"
                                                           placeholder="Company" value="{{$machinery->company_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Registration
                                                    No</label>
                                                <div class="col-md-8">
                                                    <input name="registration_no" type="text" class="form-control"
                                                           placeholder="Registration No" value="{{$machinery->reg_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Serial
                                                    No</label>
                                                <div class="col-md-8">
                                                    <input name="serial_no" type="text" class="form-control"
                                                           placeholder="Serial No" value="{{$machinery->serial_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Chasis
                                                    No</label>
                                                <div class="col-md-8">
                                                    <input name="chasis_no" type="text" class="form-control"
                                                           placeholder="Chasis No" value="{{$machinery->chasis_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Engine
                                                    No</label>
                                                <div class="col-md-8">
                                                    <input name="engine_no" type="text" class="form-control"
                                                           placeholder="Engine No" value="{{$machinery->engine_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Reg
                                                    Card</label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;">
                                                            <img src="{{ asset('/') .$machinery->reg_card_url}}">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">ACC
                                                    Code</label>
                                                <div class="col-md-8">
                                                    <input name="acc_code" type="text" class="form-control"
                                                           placeholder="ACC Code" value="{{$machinery->acc_code}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Year
                                                    Made</label>
                                                <div class="col-md-8">
                                                    <input name="year_made" type="text" class="form-control"
                                                           placeholder="Year Made" value="{{$machinery->year_made}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Date
                                                    Purchase</label>
                                                <div class="col-md-8">
                                                    <input name="date_purchase" type="text" class="form-control"
                                                           placeholder="Date Purchase"
                                                           value="{{$machinery->date_purchase}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Purchase
                                                    Price</label>
                                                <div class="col-md-8">
                                                    <input name="purchase_price" type="text" class="form-control"
                                                           placeholder="Purchase Price"
                                                           value="{{$machinery->purchase_price}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 bold" style="margin-top:7px;">Remarks</label>
                                                <div class="col-md-8">
                                                    <textarea name="remark" class="form-control" placeholder="Remarks"
                                                              rows="2">{{$machinery->remarks}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3 bold">Machine Pictures</label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 200px; height: 150px;">
                                                            <img src="{{ $machinery->getPicture(0) ? asset($machinery->getPicture(0)) :asset('assets/img/upload_img_big.png')}}">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group ">
                                                <label class="control-label col-md-3 bold"></label>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 100px; height: 50px;">
                                                            <img src="{{ $machinery->getPicture(1) ? asset($machinery->getPicture(1)) :asset('assets/img/upload_img.png')}}">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 100px; height: 50px;">
                                                            <img src="{{ $machinery->getPicture(2) ? asset($machinery->getPicture(2)) :asset('assets/img/upload_img.png')}}">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 100px; height: 50px;">
                                                            <img src="{{ $machinery->getPicture(3) ? asset($machinery->getPicture(3)) :asset('assets/img/upload_img.png')}}">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="action-toolbar">
            <a class="btn btn-sm dark" style="width: 100px;border-radius:5px !important;"
               href="{{ route('machinery') }}">BACK</a>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/machinery-detail.js') }}" type="text/javascript"></script>
@endsection
