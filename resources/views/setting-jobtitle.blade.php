@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/setting-jobtitle.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 350px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING -> JOB TITLE </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="table-container">
                                        <table class="table table-striped table-hover " id="datatable-jobtitle"
                                               data-url="{{route('setting.data.jobtitle')}}">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th width="10%" class="text-center"> #</th>
                                                <th width="30%" class="text-center"> Position</th>
                                                <th width="30%" class="text-center"> Description</th>
                                                <th width="30%" class="text-center"> Action</th>
                                            </tr>
                                            <tr role="row" class="filter">
                                                <td>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           name="position" placeholder="Position">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           name="description" placeholder="Description">
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-md-offset-1" style="margin-top: 20px;">
                                @if(empty($job))
                                    @if(Auth::user()->hasAccess('setting', 'add'))
                                        <form action="{{route('setting.jobtitle.create')}}" method="post">
                                            {{ csrf_field() }}
                                            @if(count($errors) > 0)
                                                <div class="row">
                                                    <div class="col-md-12">
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
                                            @endif
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-12" style="margin-top:10px; margin-bottom: 20px;">
                                                    <span class="job-title">Add Job Title</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold"
                                                           style="margin-top:7px;">Position</label>
                                                    <div class="col-md-7">
                                                        <input type="text" name="position" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Description</label>
                                                    <div class="col-md-7">
                                                        <input type="text" name="description" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-11">
                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm pull-right btn-circle"
                                                            style="width: 150px;">ADD
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @else
                                    @if(Auth::user()->hasAccess('setting', 'edit'))
                                        <form action="{{route('setting.jobtitle.update')}}" method="post">
                                            {{ csrf_field() }}
                                            @if(count($errors) > 0)
                                                <div class="row">
                                                    <div class="col-md-12">
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
                                            @endif
                                            <input type="hidden" name="id" value="{{$job->id}}">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-12" style="margin-top:10px; margin-bottom: 20px;">
                                                    <span class="job-title">Edit Job Title</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold"
                                                           style="margin-top:7px;">Position</label>
                                                    <div class="col-md-7">
                                                        <input type="text" name="position" class="form-control" value="{{$job->position}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4 bold" style="margin-top:7px;">Description</label>
                                                    <div class="col-md-7">
                                                        <input type="text" name="description" class="form-control"  value="{{$job->description}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-11">
                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm pull-right btn-circle"
                                                            style="width: 150px;">SAVE
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                            </div>
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
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/setting-jobtitle.js') }}" type="text/javascript"></script>
@endsection
