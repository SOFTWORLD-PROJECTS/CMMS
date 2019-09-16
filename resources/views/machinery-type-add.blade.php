@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/machinery-add.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 180px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;"> Type ->
                            ADD </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('machinery.type.create')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            @if(count($errors) > 0)
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
                                            @endif
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Type</label>
                                                    <div class="col-md-8">
                                                        <input name="type" type="text" class="form-control"
                                                               placeholder="Type" value="{{ old('type') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">ACC
                                                        Code</label>
                                                    <div class="col-md-8">
                                                        <input name="acc_code" type="text" class="form-control"
                                                               placeholder="ACC Code" value="{{ old('acc_code') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Description</label>
                                                    <div class="col-md-8">
                                                        <textarea name="description" class="form-control"
                                                                  placeholder="Description"
                                                                  rows="5">{{ old('description') }}</textarea>
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
                                   href="{{route('machinery', ['type' => 'type']) }}">DISCARD</a>
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
    <script src="{{asset('assets/scripts/pages/machinery-add.js') }}" type="text/javascript"></script>
@endsection
