@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/pages/premaintenance-add.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="portlet light  bordered box-shadow" style="height: 100%;">
    <div class="portlet-body no-padding" style=" background: #f3f3f4;">
        <div class="tabbable-custom tabbable-parallel">
            <ul class="nav nav-tabs ">
                <li class="active" style="width: 300px; background-color: white !important;">
                    <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                        Prevent Maintenance ->
                        ADD </a>
                </li>
            </ul>
            <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                <div class="tab-pane active" id="listing-add">
                    <form action="{{route('premaintenance.create')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
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
                        <div class="col-md-12" style="padding-left: 50px;margin-top:30px;">
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
                                            <label class="control-label col-md-3 bold" style="margin-top:7px;">Registration
                                                No</label>
                                            <div class="col-md-8">
                                                <input name="reg_no" type="text" class="form-control" value="{{old('reg_no')}}"
                                                       placeholder="Registration No">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 bold" style="margin-top:7px;">Service Type</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="service_type" value="{{ old('service_type') }}" placeholder="Service Type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 bold" style="margin-top:7px;">Service Unit</label>
                                            <div class="col-md-8">
                                                <div class="radio-list" style=" margin-top: 8px;">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="service_unit" value="km" {{ old('service_unit') == 'km' || !old('service_unit') ? 'checked' : '' }}> Km </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="service_unit"  value="hour" {{ old('service_unit') == 'hour' ? 'checked' : '' }}> Hours </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="service_unit" value="date" {{ old('service_unit') == 'date' ? 'checked' : '' }}> Date </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 bold" style="margin-top:7px;">Routine Service</label>
                                            <div class="col-md-6">
                                                <input  type="number" name="routine_service" class="form-control" placeholder="Routine Service" value="{{ old('routine_service') }}">
                                            </div>
                                            <label class="control-label service-unit-label col-md-3 bold uppercase" style="margin-top:7px;">{{  !old('service_unit') ? 'km' : old('service_unit') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 bold" style="margin-top:7px;">Current</label>
                                            <div class="col-md-6">
                                                <input name="current" type="number" class="form-control" value="{{ old('current') }}"
                                                       placeholder="Current">
                                            </div>
                                            <label class="control-label service-unit-label col-md-2 bold uppercase" style="margin-top:7px;">{{  !old('service_unit') ? 'km' : old('service_unit') }}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label class="control-label col-md-4 bold" style="margin-top:7px;">Last Service Date</label>
                                            <div class="col-md-8">
                                               <div class="input-group date date-picker margin-bottom-5"
                                                             data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_service_date" placeholder="Last Service Date"
                                                           value="{{old('last_service_date')}}">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-sm default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="action-toolbar">
                        <a class="btn btn-sm dark" style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                           href="{{ route('premaintenance') }}">DISCARD</a>
                        <button type="submit" class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;">SAVE</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/premaintenance-add.js') }}" type="text/javascript"></script>
@endsection
