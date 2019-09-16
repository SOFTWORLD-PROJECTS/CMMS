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
                    <li class="active" style="width: 200px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            User -> EDIT </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('setting.usermanage.update')}}" method="post">
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
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="col-md-12" style="padding-left: 50px;margin-top:30px;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Name</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="name" class="form-control"
                                                               placeholder="Name" value="{{ $user->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" name="password" class="form-control"
                                                               placeholder="Password" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" name="email" class="form-control"
                                                               placeholder="Email" value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Department</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="department" class="form-control"
                                                               placeholder="Department" value="{{ $user->department }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Position</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="position">
                                                            @foreach($jobs as $job)
                                                                <option value="{{$job->id}}"
                                                                        @if($user->job_id == $job->id) selected @endif >{{$job->position}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Status</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="status">
                                                            <option value="active"
                                                                    @if($user->status == 'active') selected @endif>
                                                                Active
                                                            </option>
                                                            <option value="inactive" @if($user->status == 'inactive') selected @endif>
                                                                Inactive
                                                            </option>
                                                        </select>
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
                                   href="{{ route('setting.usermanage') }}">DISCARD</a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                        style="width: 100px;border-radius:5px !important;">SAVE</a>
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
    <script src="{{asset('assets/scripts/pages/setting-usermanage-add.js') }}" type="text/javascript"></script>
@endsection
