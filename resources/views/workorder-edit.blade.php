@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/workorder-edit.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 250px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;"> Work Order ->
                            EDIT </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('workorder.update')}}" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="id" value="{{ $workorder->id }}">
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
                                                                   name="create_time"
                                                                   value="{{$workorder->create_time}}">
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
                                                        <select name="type" class="form-control">
                                                            @foreach($types as $type)
                                                                <option value="{{ $type->id }}"
                                                                        @if($workorder->type_id == $type->id) selected @endif>{{ $type->name }}</option>
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
                                                                        @if($workorder->model_id == $model->id) selected @endif>{{ $model->name }}</option>
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
                                                        <div class="input-group date date-picker margin-bottom-5"
                                                             data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm"
                                                                   readonly
                                                                   name="estimate_time" placeholder="Estimate Time"
                                                                   value="{{$workorder->estimate_time}}">
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
                                                                       checked><b>
                                                                    Self Service </b>
                                                            </label>
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
                                            <a href="javascript::" id="add-parts-use"
                                               class="btn btn-danger btn-sm btn-circle pull-right"
                                               style="margin-right:10px;width: 100px;">ADD
                                            </a>
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
                                                        <th width="10%" class="text-center"> Action</th>
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
                                            <a href="#" class="btn btn-danger btn-sm btn-circle pull-right"
                                               style="margin-right:10px;width: 100px;" id="add-service">ADD
                                            </a>
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
                                                        <th width="10%"> Action</th>
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
                                                       data-url="{{ route('workorder.service.data' ,['id' => $workorder->id, 'service_type' => 'vendor']) }}">
                                                    <thead>
                                                    <tr>
                                                        <th width="10%">#</th>
                                                        <th width="15%">RFS</th>
                                                        <th width="15%"> Service No</th>
                                                        <th width="15%"> Service Name</th>
                                                        <th width="10%"> Vendor</th>
                                                        <th width="10%"> Amount</th>
                                                        <th width="10%"> Status</th>
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
                                                            <input type="file" name="pic" id="upload-pic"
                                                                   data-url={{route('workorder.picture.create', ['id' => $workorder->id])}}> </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div id="picture-container"
                                                         data-url="{{route('workorder.picture.data', ['id' => $workorder->id])}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row" style="margin-bottom: 15px;padding: 10px;"
                                                 id="remark-container">
                                                <div class="form-group">
                                                    <label class="control-label col-md-2 bold" style="margin-top:7px;">Remark</label>
                                                    <div class="col-md-7">
                                                            <textarea name="remark" type="text" class="form-control"
                                                                      placeholder="Remark" rows="4"
                                                                      id="remark-text"></textarea>
                                                    </div>
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
                                                        <a id="remark-save"
                                                           class="btn btn-danger btn-xs btn-circle pull-right"
                                                           style="margin-right:10px;width: 80px;margin-top:15px;"
                                                           data-url="{{ route('workorder.remark.create', [ 'id' => $workorder->id]) }}">SAVE
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
    <div id="parts-use-self-modal" class="modal fade" data-width="600" data-backdrop="static">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Parts Use</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" id="parts-use-self-form"
                          data-url="{{route('workorder.partsuse.create', ['id' =>$workorder->id, 'service_type' => 'self'])}}">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Part No</label>
                                <div class="col-md-8">
                                    <select class="form-control part_no_select" name="part_no" >
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->partno}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Part Name</label>
                                <div class="col-md-8">
                                    <select class="form-control part_name_select" name="part_name">
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Required QTY</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control"
                                           placeholder="Required QTY" name="required_qty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Order QTY</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="Order QTY"
                                           name="order_qty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">U. Price</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="U. Price"
                                           name="u_price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold" style="padding-top: 1px;">IRF</label>
                                <div class="col-md-8">
                                    <input type="checkbox" class="form-control irf_check" name="irf"
                                           value="1">
                                </div>
                            </div>
                            <div class="form-group display-hide unit_measure_wrapper">
                                <label class="col-md-3 control-label bold">Unit Of Measure</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Unit Of Measure"
                                           name="unit_measure">
                                </div>
                            </div>
                            <div class="form-group display-hide remarks_wrapper">
                                <label class="col-md-3 control-label bold">Remarks</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" style="width:150px;">Close</button>
                <button type="button" class="btn green" id="save-parts-use-self" style="width:150px;">Save</button>
            </div>
        </div>
    </div>
    <div id="parts-use-vendor-modal" class="modal fade" data-width="600" data-backdrop="static">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Parts Use</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" id="parts-use-vendor-form"
                          data-url="{{route('workorder.partsuse.create', ['id' =>$workorder->id, 'service_type' => 'vendor'])}}">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Part No</label>
                                <div class="col-md-8">
                                    <select class="form-control part_no_select" name="part_no">
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->partno}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Part Name</label>
                                <div class="col-md-8">
                                    <select class="form-control part_name_select" name="part_name">
                                        @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Required QTY</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control"
                                           placeholder="Required QTY" name="required_qty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">On Hand QTY</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control"
                                           placeholder="On Hand QTY" name="onhand_qty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Order QTY</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="Order QTY"
                                           name="order_qty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">U. Price</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="U. Price"
                                           name="u_price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold" style="padding-top: 1px;">IRF</label>
                                <div class="col-md-8">
                                    <input type="checkbox" class="form-control irf_check" name="irf"
                                           value="1">
                                </div>
                            </div>
                            <div class="form-group display-hide unit_measure_wrapper" >
                                <label class="col-md-3 control-label bold">Unit Of Measure</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Unit Of Measure"
                                           name="unit_measure">
                                </div>
                            </div>
                            <div class="form-group display-hide remarks_wrapper">
                                <label class="col-md-3 control-label bold">Remarks</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" style="width:150px;">Close</button>
                <button type="button" class="btn green" id="save-parts-use-vendor" style="width:150px;">Save</button>
            </div>
        </div>
    </div>
    <div id="service-self-modal" class="modal fade" data-width="600" data-backdrop="static">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Parts Use</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" id="service-self-form"
                          data-url="{{route('workorder.service.create', ['id' =>$workorder->id, 'service_type' => 'self'])}}">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Service No</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Service No"
                                           name="service_no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Service Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Service Name"
                                           name="service_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Assigned To</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Assigned To"
                                           name="assigned_to">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" style="width:150px;">Close</button>
                <button type="button" class="btn green" id="save-service-self" style="width:150px;">Save</button>
            </div>
        </div>
    </div>
    <div id="service-vendor-modal" class="modal fade" data-width="600" data-backdrop="static">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Parts Use</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" id="service-vendor-form"
                          data-url="{{route('workorder.service.create', ['id' =>$workorder->id, 'service_type' => 'vendor'])}}">
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Service No</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Service No"
                                           name="service_no">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Service Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Service Name"
                                           name="service_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Vendor</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control"
                                           placeholder="Vendor" name="vendor">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold">Amount</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="Amount"
                                           name="amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label bold" style="padding-top: 1px;">RFS</label>
                                <div class="col-md-8">
                                    <input type="checkbox" class="form-control" name="rfs"
                                           value="1">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" style="width:150px;">Close</button>
                <button type="button" class="btn green" id="save-service-vendor" style="width:150px;">Save</button>
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
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-validation/js/additional-methods.min.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/workorder-edit.js') }}" type="text/javascript"></script>
@endsection
