@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/workorder-detail.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 250px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;"> Work Order ->
                            DETAIL </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="action-toolbar">
                            <a class="btn btn-sm dark"
                               style="width: 100px;border-radius:5px !important;"
                               href="{{ route('workorder') }}">DISCARD</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 50px;padding-right:50px;margin-top:10px;">
                                <span class="workorder-detail">Work Order Detail</span>
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
                            <input type="hidden" name="id" value="{{ $workorder->id }}">
                            <div class="col-md-12" style="padding-left: 50px;padding-right:50px;margin-top:20px;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Date
                                                    / Time</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" value="{{$workorder->create_time}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Work
                                                    Order No</label>
                                                <div class="col-md-7">
                                                    <input name="wo_no" type="text" class="form-control"
                                                           placeholder="Work Order No"
                                                           value="{{$workorder->wo_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold"
                                                       style="margin-top:7px;">Type</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" value="{{$workorder->type->name}}">
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
                                                    <input type="text" class="form-control" value="{{$workorder->model->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Registration
                                                    No</label>
                                                <div class="col-md-7">
                                                    <input name="reg_no" type="text" class="form-control"
                                                           placeholder="Registration No"
                                                           value="{{$workorder->reg_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Assign
                                                    To</label>
                                                <div class="col-md-7">
                                                    <input name="assign_to" type="text" class="form-control"
                                                           value="{{$workorder->assign_to}}"
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
                                                           placeholder="Title" value="{{ $workorder->title }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Estimation
                                                    Completion Time</label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" value="{{$workorder->estimate_time}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="service_type" value="self" checked><b> Self Service </b></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="service_type" value="vendor">
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-container" id="datatable-parts-use-self-wrapper">
                                            <table class="table table-striped table-hover"
                                                   id="datatable-parts-use-self"
                                                   data-url="{{ route('workorder.partsuse.data' ,['id' => $workorder->id, 'service_type' => 'self']) }}">
                                                <thead>
                                                <tr>
                                                    <th width="5%" class="text-center">#</th>
                                                    <th width="10%" class="text-center">IRF</th>
                                                    <th width="10%" class="text-center"> Part No</th>
                                                    <th width="15%" class="text-center"> Part Name</th>
                                                    <th width="10%" class="text-center"> Required QTY</th>
                                                    <th width="10%" class="text-center"> Order QTY</th>
                                                    <th width="10%" class="text-center"> U. Price</th>
                                                    <th width="10%" class="text-center"> Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-container display-hide"
                                             id="datatable-parts-use-vendor-wrapper">
                                            <table class="table table-striped table-hover"
                                                   id="datatable-parts-use-vendor"
                                                   data-url="{{ route('workorder.partsuse.data' ,['id' => $workorder->id, 'service_type' => 'vendor']) }}">
                                                <thead>
                                                <tr>
                                                    <th width="5%" class="text-center">#</th>
                                                    <th width="8%" class="text-center">IRF</th>
                                                    <th width="8%" class="text-center"> Part No</th>
                                                    <th width="15%" class="text-center"> Part Name</th>
                                                    <th width="10%" class="text-center"> Required QTY</th>
                                                    <th width="10%" class="text-center"> On hand QTY</th>
                                                    <th width="10%" class="text-center"> Order QTY</th>
                                                    <th width="8%" class="text-center"> U. Price</th>
                                                    <th width="8%" class="text-center"> Amount</th>
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-container" id="datatable-service-self-wrapper">
                                            <table class="table table-striped table-hover"
                                                   id="datatable-service-self"
                                                   data-url="{{ route('workorder.service.data' ,['id' => $workorder->id, 'service_type' => 'self']) }}">
                                                <thead>
                                                <tr>
                                                    <th width="10%">#</th>
                                                    <th width="20%"> Service No</th>
                                                    <th width="20%"> Service Name</th>
                                                    <th width="10%"> Assign To</th>
                                                    <th width="10%"> Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-container display-hide"
                                             id="datatable-service-vendor-wrapper">
                                            <table class="table table-striped table-hover display-hide"
                                                   id="datatable-service-vendor"
                                                   data-url="{{ route('workorder.service.data' ,['id' => $workorder->id, 'service_type' => 'vendor'])}}">
                                                <thead>
                                                <tr>
                                                    <th width="10%">#</th>
                                                    <th width="15%">RFS</th>
                                                    <th width="15%"> Service No</th>
                                                    <th width="15%"> Service Name</th>
                                                    <th width="10%"> Vendor</th>
                                                    <th width="10%"> Amount</th>
                                                    <th width="10%"> Status</th>
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
                                                          style="margin-right: 25px;">Pictures</span>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="picture-container"
                                                     data-url="{{route('workorder.picture.data', ['id' => $workorder->id])}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row" style="margin-bottom: 15px;padding: 10px;" id="remark-container">
                                            <div class="form-group">
                                                <label class="control-label col-md-2 bold" style="margin-top:7px;">Remark</label>
                                                <div class="col-md-2">
                                                    <a href="javascript:;" id="remark-show"
                                                       class="btn btn-outline dropdown-toggle"
                                                       data-toggle="dropdown" aria-expanded="true"
                                                       style="border: 1px solid #dcddde; padding: 5px; border-radius: 5px !important;">
                                                        <img src="{{asset('assets/img/document.jpg')}}"
                                                             style="max-width: 40px;">
                                                    </a>
                                                    <ul class="dropdown-menu pull-left bottom-up"
                                                        id="remark-menu-container"
                                                        data-url="{{route('workorder.remark.data', ['id' => $workorder->id])}}">
                                                    </ul>
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
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/workorder-detail.js') }}" type="text/javascript"></script>
@endsection
