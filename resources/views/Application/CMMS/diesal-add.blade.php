@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/diesal-add.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 200px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            Diesel -> ADD </a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('diesal.create')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12" style="padding-left: 50px;margin-top:10px;">
                                    <span class="workorder-detail">Diesel Details</span>
                                </div>
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
                                <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold"
                                                           style="margin-top:7px;">Date</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group date date-picker margin-bottom-5"
                                                             data-date-format="yyyy-mm-dd">
                                                            <input type="text" class="form-control form-filter input-sm"
                                                                   readonly
                                                                   name="create_date" placeholder="Date"
                                                                   value="{{old('create_date')}}">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Reg
                                                        No</label>
                                                    <div class="col-md-8">
                                                        <input name="reg_no" type="text" class="form-control"
                                                               placeholder="Registration No"
                                                               value="{{ old('reg_no') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Month/Year</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group date date-picker margin-bottom-5"
                                                             data-date-format="yyyy-mm" data-date-viewmode="years"
                                                             data-date-minviewmode="months">
                                                            <input type="text" class="form-control" name="month_year"
                                                                   readonly value="{{old('month_year')}}">
                                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 bold" style="margin-top:7px;">Driver</label>
                                                    <div class="col-md-8">
                                                        <input name="driver" type="text" class="form-control"
                                                               value="{{old('driver')}}"
                                                               placeholder="Driver">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-left: 50px;margin-top:20px;">
                                    <hr style="border-top: 1px solid #626365;margin-top: 0px; margin-bottom: 30px; margin-right: 40px;">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <table class="table table-striped table-hover"
                                                   style=" border: 2px solid #e7ecf1;">
                                                <thead>
                                                <tr>
                                                    <th style="width: 25%;" class="text-center"> Date</th>
                                                    <th style="width: 25%;" class="text-center"> Litre</th>
                                                    <th style="width: 25%;" class="text-center"> By</th>
                                                    <th style="width: 25%;" class="text-center">
                                                        <a href="javascript::" class="btn btn-danger btn-sm btn-circle"
                                                           style="width: 120px;" id="diesal-add">ADD
                                                        </a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody id="diesal-container">
                                                @if(old('diesels'))
                                                    @foreach(old('diesels') as $key => $diesel)
                                                        <tr data-id="{{$key}}">
                                                            <td>
                                                                <div class="input-group date date-picker margin-bottom-5"
                                                                     data-date-format="yyyy-mm-dd">
                                                                    <input type="text"
                                                                           class="form-control form-filter input-sm"
                                                                           readonly
                                                                           name="diesels[{{$key}}][date]"
                                                                           placeholder="Date"
                                                                           value="{{$diesel['date']}}">
                                                                    <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       class="form-control form-filter input-sm"
                                                                       name="diesels[{{$key}}][litre]"
                                                                       placeholder="Litre" value="{{$diesel['litre']}}">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       class="form-control form-filter input-sm"
                                                                       name="diesels[{{$key}}][by]" placeholder="By"
                                                                       value="{{$diesel['by']}}">
                                                            </td>
                                                            <td>
                                                                <a href="javascript:;"
                                                                   class="btn btn-icon-only default btn-circle disal-delete-btn">
                                                                    <i class="fa fa-close"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="action-toolbar">
                                <a class="btn btn-sm dark"
                                   style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                                   href="{{ route('diesal', ['type' => 'diesel']) }}">DISCARD</a>
                                <button type="submit" class="btn btn-danger btn-sm"
                                        style="width: 100px;border-radius:5px !important;">
                                    SAVE
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
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/diesal-add.js') }}" type="text/javascript"></script>
@endsection
