@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/setting-audittrail.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 350px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING ->
                            AUDIT TRAIL</a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="table-container">
                            <table class="table table-striped table-hover " id="datatable" data-url="{{route('setting.data.audittrail')}}">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="5%" class="text-center"> #</th>
                                    <th width="14%" class="text-center"> Date, Time</th>
                                    <th width="14%" class="text-center"> User</th>
                                    <th width="14%" class="text-center"> Level</th>
                                    <th width="14%" class="text-center"> Module</th>
                                    <th width="14%" class="text-center"> Action</th>
                                    <th width="20%" class="text-center"> Reference</th>
                                    <th width="5%" class="text-center"></th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="date_time" placeholder="Date Time">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="user" placeholder="User">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="level" placeholder="Level">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="module" placeholder="Module">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="action" placeholder="Action">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="reference" placeholder="Reference">
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
                        <div class="date-toolbar">
                            <label class="bold"  style="width:100px;margin-top: 6px;">DATE FROM: </label>
                            <div class="input-group date date-picker margin-bottom-5"
                                 data-date-format="yyyy-mm-dd" style="width:200px;">
                                <input type="text" class="form-control form-filter input-sm"
                                       readonly
                                       name="date_from" id="date_from" placeholder="Date From">
                                <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                            </div>
                            <label class="bold"  style="width:50px;margin-top: 6px; text-align: center;">TO: </label>
                            <div class="input-group date date-picker margin-bottom-5"
                                 data-date-format="yyyy-mm-dd" style="width:200px;">
                                <input type="text" class="form-control form-filter input-sm"
                                       readonly
                                       name="date_to" id="date_to" placeholder="Date To">
                                <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                            </div>
                            <label class="bold"  style="width:50px;text-align: center;">
                                <button class="btn btn-sm green btn-outline filter-submit margin-bottom" id="search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </label>
                        </div>
                        <div class="action-toolbar">
                            <a class="btn btn-sm purple" style="width: 100px;border-radius:5px !important;"
                               href="{{ route('setting') }}">DISCARD</a>
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
    <script src="{{asset('assets/scripts/pages/setting-audittrail.js') }}" type="text/javascript"></script>
@endsection
