@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/setting-usermaintain.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 350px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING -> USER MAINTENANCE </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="row">
                            <div class="col-md-12 text-center"
                                 style="padding-left: 25%;padding-right: 15%; margin-top: 120px;">
                                <div class="box-wrapper">
                                    <a href="{{route('setting.jobtitle')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/job-title.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Job Title</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('setting.useraccess')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/user-access.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>User Access</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('setting.usermanage')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/user-management.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>User Management</span>
                                        </p>
                                    </a>
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
    <script src="{{asset('assets/scripts/pages/setting-usermaintain.js') }}" type="text/javascript"></script>
@endsection
