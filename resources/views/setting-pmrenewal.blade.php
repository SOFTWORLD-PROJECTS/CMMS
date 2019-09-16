@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/premaintenance-add.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 300px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            System Variable ->
                            SETTING </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('setting.pm-renewal.save')}}" method="post">
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
                                            <div class="row"
                                                 style="margin-bottom: 15px; border-bottom: 1px solid #c2cad8; margin-left: 0px; margin-right: 0px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-12 bold text-center"
                                                           style="margin-top:7px;">Prevent Maintenance</label>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">P.M
                                                        Km</label>
                                                    <div class="col-md-8">
                                                        <input type="number" name="pm_km" class="form-control"
                                                               placeholder="P.M Km" value="{{ $setting ? $setting->pm_km : old('pm_km') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">P.M
                                                        Hour</label>
                                                    <div class="col-md-8">
                                                        <input type="number" name="pm_hour" class="form-control"
                                                               placeholder="P.M Hour" value="{{$setting ? $setting->pm_hour :  old('pm_hour') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">P.M
                                                        Date</label>
                                                    <div class="col-md-8">
                                                        <input type="number" name="pm_date" class="form-control"
                                                               placeholder="P.M Date" value="{{$setting ? $setting->pm_date :  old('pm_date') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"
                                                 style="margin-bottom: 15px; border-bottom: 1px solid #c2cad8; margin-left: 0px; margin-right: 0px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-12 bold text-center"
                                                           style="margin-top:7px;">Renewal</label>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Renewal
                                                        Days</label>
                                                    <div class="col-md-8">
                                                        <input type="number" name="renewal_days" class="form-control"
                                                               placeholder="Renewal Days"
                                                               value="{{ $setting ? $setting->renewal_days :  old('renewal_days') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"
                                                 style="margin-bottom: 15px; border-bottom: 1px solid #c2cad8; margin-left: 0px; margin-right: 0px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-12 bold text-center"
                                                           style="margin-top:7px;">Diesel Balance</label>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Current Balance</label>
                                                    <div class="col-md-8">
                                                        <input type="number" name="current_balance" class="form-control"
                                                               placeholder="Current Balance" value="{{ $setting ? $setting->current_balance : old('current_balance') }}">
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
                                   href="{{ route('setting') }}">DISCARD</a>
                                @if(Auth::user()->hasAccess('setting', 'edit'))
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            style="width: 100px;border-radius:5px !important;">SAVE</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/renewal-add.js') }}" type="text/javascript"></script>
@endsection
