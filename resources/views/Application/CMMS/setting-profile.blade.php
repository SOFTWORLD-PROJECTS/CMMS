@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/setting-profile.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 300px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING -> PROFILE </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{ route('setting.profile.save') }}" method="post" enctype="multipart/form-data">
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
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Company
                                                    Name</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="company_name" class="form-control" value="{{ $user->profile ? $user->profile->company_name : old('company_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Co.Registration
                                                    No</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="co_reg_no" class="form-control" value="{{ $user->profile ? $user->profile->co_reg_no : old('co_reg_no') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Address</label>
                                                <div class="col-md-7">
                                                    <textarea name="address" class="form-control" rows="3">{{ $user->profile ? $user->profile->address : old('address') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Contact</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="contact" class="form-control" value="{{ $user->profile ? $user->profile->contact : old('contact') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold"
                                                       style="margin-top:7px;">Fax</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="fax" class="form-control" value="{{ $user->profile ? $user->profile->fax : old('fax') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold"
                                                       style="margin-top:7px;">Email</label>
                                                <div class="col-md-7">
                                                    <input type="email" name="email" class="form-control" value="{{ $user ? $user->email : old('email') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Website</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="website" class="form-control" value="{{ $user->profile ? $user->profile->website : old('website') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 bold" style="margin-top:7px;">Category</label>
                                                <div class="col-md-7">
                                                    <input type="text" name="category" class="form-control" value="{{ $user->profile ? $user->profile->category : old('category') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="row" style="margin-bottom: 15px;">
                                            <div class="form-group ">
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail"
                                                             data-trigger="fileinput"
                                                             style="width: 180px; height: 180px;">
                                                            <img src="{{ $user->profile ? asset($user->profile->avatar) : asset('assets/img/upload_img_big.png') }}"  style="width: 150px; height: 150px; padding: 20px;">
                                                        </div>
                                                        <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> Select image </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="avatar"> </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists"
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
                            <a class="btn btn-sm dark" style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                               href="{{ route('setting') }}">DISCARD</a>
                            @if(Auth::user()->hasAccess('setting', 'edit'))
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;">SAVE</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{ asset('assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/setting-profile.js') }}" type="text/javascript"></script>
@endsection
