@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/record.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style=" background: #f3f3f4;">
                    <div class="tabbable-custom tabbable-parallel">
                        <ul class="nav nav-tabs ">
                            <li class="@if($type == 'smu') active @endif">
                                <a href="#smu" data-toggle="tab"> SMU </a>
                            </li>
                            <li class="@if($type == 'mileage') active @endif">
                                <a href="#mileage" data-toggle="tab"> Mileage </a>
                            </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="tab-pane @if($type == 'smu') active @endif" id="smu">
                                @if(Auth::user()->hasAccess('record', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('record.add', ['type' => 'smu']) }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-smu"
                                           data-url="{{route('record.data.smu')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="13%" class="text-center"> Date</th>
                                            <th width="10%" class="text-center"> Type</th>
                                            <th width="10%" class="text-center"> Model</th>
                                            <th width="12%" class="text-center"> Reg No</th>
                                            <th width="15%" class="text-center"> Hour Current Meter</th>
                                            <th width="15%" class="text-center"> Last Meter</th>
                                            <th width="10%" class="text-center"> By</th>
                                            <th width="10%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="date" placeholder="Date">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <select name="type" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($types as $t)
                                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="model" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($models as $model)
                                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="current_meter" placeholder="Hour Current Meter">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="last_meter" placeholder="Last Meter">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="by" placeholder="By">
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
                            <div class="tab-pane @if($type == 'mileage') active @endif" id="mileage">
                                @if(Auth::user()->hasAccess('record', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{route('record.add', ['type' => 'mileage'])  }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-mileage"
                                           data-url="{{route('record.data.mileage')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="4%" class="text-center"> #</th>
                                            <th width="14%" class="text-center"> Date</th>
                                            <th width="12%" class="text-center"> Type</th>
                                            <th width="14%" class="text-center"> Reg No</th>
                                            <th width="15%" class="text-center"> Current Meter</th>
                                            <th width="15%" class="text-center"> Last Meter</th>
                                            <th width="14%" class="text-center"> By</th>
                                            <th width="12%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="date_Time" placeholder="Date">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <select name="type" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($types as $t)
                                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_num" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="current_meter" placeholder="Current Meter">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="last_meter" placeholder="Last Meter">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="by" placeholder="By">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/record.js') }}" type="text/javascript"></script>
@endsection
