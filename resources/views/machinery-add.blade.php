@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/pages/machinery-add.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 180px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;"> Listing ->
                            ADD </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('machinery.create')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12" style="padding-left: 50px;margin-top:10px;">
                                    <span class="machine-particular">Machine Particular</span>
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
                                <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold"
                                                           style="margin-top:7px;">Type</label>
                                                    <div class="col-md-8">
                                                        <select name="type" class="form-control">
                                                            @foreach($types as $type)
                                                                <option value="{{ $type->id }}"
                                                                        @if(old('type') == $type->id) selected @endif>{{ $type->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold"
                                                           style="margin-top:7px;">Brand</label>
                                                    <div class="col-md-8">
                                                        <select name="brand" class="form-control">
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                        @if(old('brand') == $brand->id) selected @endif>{{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold"
                                                           style="margin-top:7px;">Model</label>
                                                    <div class="col-md-8">
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
                                                    <label class="control-label col-md-3 bold"
                                                           style="margin-top:7px;">Company</label>
                                                    <div class="col-md-8">
                                                        <select name="company" class="form-control">
                                                            @foreach($companies as $company)
                                                                <option value="{{ $company->id }}"
                                                                        @if(old('company') == $company->id) selected @endif>{{ $company->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Registration
                                                        No</label>
                                                    <div class="col-md-8">
                                                        <input name="reg_no" type="text" class="form-control"
                                                               value="{{ old('reg_no')  }}"
                                                               placeholder="Registration No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Serial
                                                        No</label>
                                                    <div class="col-md-8">
                                                        <input name="serial_no" type="text" class="form-control"
                                                               value="{{old('serial_no')}}"
                                                               placeholder="Serial No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Chasis
                                                        No</label>
                                                    <div class="col-md-8">
                                                        <input name="chasis_no" type="text" class="form-control"
                                                               value="{{old('chasis_no')}}"
                                                               placeholder="Chasis No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Engine
                                                        No</label>
                                                    <div class="col-md-8">
                                                        <input name="engine_no" type="text" class="form-control"
                                                               value="{{old('engine_no')}}"
                                                               placeholder="Engine No">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Reg
                                                        Card</label>
                                                    <div class="col-md-8">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="input-group input-large">
                                                                <div class="form-control uneditable-input input-fixed input-medium"
                                                                     data-trigger="fileinput">
                                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                    <span class="fileinput-filename"> </span>
                                                                </div>
                                                                <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> Select file </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="reg_card"> </span>
                                                                <a href="javascript:;"
                                                                   class="input-group-addon btn red fileinput-exists"
                                                                   data-dismiss="fileinput"> Remove </a>
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
                                                               value="{{ $nextNumber }}"
                                                               placeholder="ACC Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Year
                                                        Made</label>
                                                    <div class="col-md-8">
                                                        <input type="number" class="form-control" name="year_made"
                                                               placeholder="Year Made" value="{{old('year_made')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Date
                                                        Purchase</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group date date-picker margin-bottom-5"
                                                             data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm"
                                                                   readonly
                                                                   name="date_purchase" placeholder="Date Purchase"
                                                                   value="{{old('date_purchase')}}">
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
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Purchase
                                                        Price</label>
                                                    <div class="col-md-8">
                                                        <input name="purchase_price" type="number" class="form-control"
                                                               value="{{old('purchase_price')}}"
                                                               placeholder="Purchase Price" step="0.01">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Remarks</label>
                                                    <div class="col-md-8">
                                                    <textarea name="remarks" class="form-control" placeholder="Remarks"
                                                              rows="2">{{old('remarks')}}</textarea>
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
                                                                 style="width: 300px; height: 100px;">
                                                                <img src="{{asset('assets/img/upload_img_big.png')}}">
                                                            </div>
                                                            <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                                <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="pictures[0]">
                                                            </span>
                                                                <a href="javascript:;"
                                                                   class="btn red fileinput-exists btn-xs"
                                                                   data-dismiss="fileinput"> Remove </a>
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
                                                                <img src="{{asset('assets/img/upload_img.png')}}">
                                                            </div>
                                                            <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                                <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="pictures[1]">
                                                            </span>
                                                                <a href="javascript:;"
                                                                   class="btn red fileinput-exists btn-xs"
                                                                   data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail"
                                                                 data-trigger="fileinput"
                                                                 style="width: 100px; height: 50px;">
                                                                <img src="{{asset('assets/img/upload_img.png')}}">
                                                            </div>
                                                            <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                                <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="pictures[2]">
                                                            </span>
                                                                <a href="javascript:;"
                                                                   class="btn red fileinput-exists btn-xs"
                                                                   data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail"
                                                                 data-trigger="fileinput"
                                                                 style="width: 100px; height: 50px;">
                                                                <img src="{{asset('assets/img/upload_img.png')}}">
                                                            </div>
                                                            <div>
                                                            <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-view"> View </span>
                                                            </span>
                                                                <span class="btn red btn-outline btn-file btn-xs">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="pictures[3]">
                                                            </span>
                                                                <a href="javascript:;"
                                                                   class="btn red fileinput-exists btn-xs"
                                                                   data-dismiss="fileinput"> Remove </a>
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
                                <a class="btn btn-sm dark"
                                   style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                                   href="{{ route('machinery') }}">DISCARD</a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                        style="width: 100px;border-radius:5px !important;">SAVE
                                </button>
                            </div>
                        </form>
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
    <script src="{{asset('assets/scripts/pages/machinery-add.js') }}" type="text/javascript"></script>
@endsection
