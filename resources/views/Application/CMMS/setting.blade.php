@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/setting.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style="height: 100%; background: #f3f3f4;">
                    <div class="row" style="height: 100%;">
                        <div class="col-md-12" style="padding-left: 50px;margin-top:50px;">
                            <span class="setting uppercase">Setting</span>
                        </div>
                        <div class="col-md-12" style="padding-left: 20%;padding-right: 10%; margin-top: 30px;">
                            <div class="box-wrapper">
                                <a href="{{route('setting.profile')}}">
                                    <p class="text-center">
                                        <img src="{{ asset('assets/img/profile.png') }}">
                                    </p>
                                    <p class="text-center bold uppercase text-wrapper">
                                        <span>Profile</span>
                                    </p>
                                </a>
                            </div>
                            @if(Auth::user()->hasAccess('setting', 'view'))
                                <div class="box-wrapper">
                                    <a href="{{route('setting.usermaintain')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/user-maintenance.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>User Maintenance</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('setting.docrunning')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/doc-running-no.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Doc Running No</span>
                                        </p>
                                    </a>
                                </div>
                                {{--<div class="box-wrapper">--}}
                                    {{--<a href="{{route('setting.preset')}}">--}}
                                        {{--<p class="text-center">--}}
                                            {{--<img src="{{ asset('assets/img/preset.png') }}">--}}
                                        {{--</p>--}}
                                        {{--<p class="text-center bold uppercase text-wrapper">--}}
                                            {{--<span>Preset</span>--}}
                                        {{--</p>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                <div class="box-wrapper">
                                    <a href="{{route('setting.pm-renewal')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/preset.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>System Variable Setting</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('setting.backuprestore')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/backup-restore.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Backup / Restore</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('setting.audittrail')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/audit-trail.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Audit Trail</span>
                                        </p>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/setting.js') }}" type="text/javascript"></script>
@endsection
