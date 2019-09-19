@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/premaintenance-add.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        .form-control {
            border: none;
            border-bottom: 1px solid #c2cad8;
        }
    </style>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 250px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            Renewal ->
                            DETAIL </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
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
                            <input type="hidden" name="id" value="{{$renewal->id}}">
                            <div class="col-md-12" style="padding-left: 50px;margin-top:30px;">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Registration
                                                    No</label>
                                                <div class="col-md-8">
                                                    <input name="reg_no" type="text" class="form-control"
                                                           value="{{$renewal->reg_no}}"
                                                           placeholder="Registration No">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"
                                             style="margin-bottom: 15px; border-bottom: 1px solid #c2cad8; margin-left: 0px; margin-right: 0px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-12 bold text-center"
                                                       style="margin-top:7px;">Insurance</label>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Insurance</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="insurance" class="form-control"
                                                           placeholder="Insurance" value="{{ $renewal->insurance}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Routine</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="insurance_routine"
                                                           class="form-control"
                                                           placeholder="Routine"
                                                           value="{{ $renewal->insurance_routine }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Last
                                                    Renewal</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$renewal->insurance_last_renewal}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"
                                             style="margin-bottom: 15px; border-bottom: 1px solid #c2cad8; margin-left: 0px; margin-right: 0px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-12 bold text-center"
                                                       style="margin-top:7px;">Road Tax</label>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Road
                                                    Tax</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="road_tax" class="form-control"
                                                           placeholder="Road Tax" value="{{ $renewal->road_tax }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Routine</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="road_tax_routine"
                                                           class="form-control"
                                                           placeholder="Routine"
                                                           value="{{ $renewal->road_tax_routine  }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Last
                                                    Renewal</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$renewal->road_tax_last_renewal}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row"
                                             style="margin-bottom: 15px; border-bottom: 1px solid #c2cad8; margin-left: 0px; margin-right: 0px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-12 bold text-center"
                                                       style="margin-top:7px;">Puspakom</label>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Puspakom</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="puspakom" class="form-control"
                                                           placeholder="Puspakom" value="{{ $renewal->puspakom }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Routine</label>
                                                <div class="col-md-8">
                                                    <input type="number" name="puspakom_routine"
                                                           class="form-control"
                                                           placeholder="Routine"
                                                           value="{{ $renewal->puspakom_routine }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Last
                                                    Renewal</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$renewal->puspakom_last_renewal}}">
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
                               href="{{ route('renewal') }}">DISCARD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/renewal-add.js') }}" type="text/javascript"></script>
@endsection
