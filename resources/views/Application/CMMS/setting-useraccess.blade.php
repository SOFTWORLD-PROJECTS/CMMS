@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/setting-useraccess.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 300px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING ->
                            USER ACCESS </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="row">
                            <form action="{{route('setting.useraccess.create')}}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-12">
                                    <div class="row" style="padding-left: 20px;margin-top:25px;margin-bottom:15px;">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label bold" style="margin-top: 5px;">User
                                                    Access Group</label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="job" id="job_select" data-url="{{route('setting.useraccess')}}">
                                                        @foreach($jobs as $j)
                                                            <option value="{{$j->id}}"
                                                                    @if($job->id == $j->id) selected @endif >{{$j->position}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-left: 35px">
                                        <div class="col-md-12">
                                            <hr style="border: 1px solid #a7a9ac;margin-right: 40px;margin-top:10px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-1">
                                            <table class="table table-striped table-hover"
                                                   style=" border: 2px solid #e7ecf1;">
                                                <thead>
                                                <tr>
                                                    <th style="width: 15%;" class="text-center"> No</th>
                                                    <th style="width: 25%;" class="text-center"> Name</th>
                                                    <th style="width: 20%;" class="text-center"> ADD</th>
                                                    <th style="width: 20%;" class="text-center"> EDIT</th>
                                                    <th style="width: 20%;" class="text-center"> VIEW</th>
                                                </tr>
                                                </thead>
                                                <tbody id="diesal-container">
                                                @if(!empty($pages))
                                                    @foreach($pages as $key => $page)
                                                        <tr>
                                                            <td>
                                                                {{$key + 1}}
                                                            </td>
                                                            <td>
                                                                {{$page->name}}
                                                            </td>
                                                            @if($page->job_access($job->id))
                                                                <td>
                                                                    <input type="checkbox" class="form-control"
                                                                           value="1"
                                                                           name="job_access[{{$page->id}}][is_add]" @if($page->job_access($job->id)->is_add > 0) checked @endif >
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-control"
                                                                           value="1"
                                                                           name="job_access[{{$page->id}}][is_edit]" @if($page->job_access($job->id)->is_edit > 0) checked @endif>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-control"
                                                                           value="1"
                                                                           name="job_access[{{$page->id}}][is_view]" @if($page->job_access($job->id)->is_view > 0) checked @endif>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <input type="checkbox" class="form-control"
                                                                           value="1"
                                                                           name="job_access[{{$page->id}}][is_add]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-control"
                                                                           value="1"
                                                                           name="job_access[{{$page->id}}][is_edit]">
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" class="form-control"
                                                                           value="1"
                                                                           name="job_access[{{$page->id}}][is_view]">
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if(Auth::user()->hasAccess('setting', 'edit'))
                                        <div class="row" style="padding-left: 20px;margin-top:15px;margin-bottom:15px;">
                                            <div class="col-md-4 col-md-offset-2">
                                                <button type="submit" class="btn btn-primary btn-block">Save</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="action-toolbar">
            <a class="btn btn-sm purple" style="width: 100px;border-radius:5px !important; margin-right: 15px;"
               href="{{ route('setting.usermaintain') }}">DISCARD</a>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/setting-useraccess.js') }}" type="text/javascript"></script>
@endsection
