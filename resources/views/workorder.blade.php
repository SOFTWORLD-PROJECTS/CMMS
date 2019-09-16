@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/workorder.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style=" background: #f3f3f4;">
                    <div class="tabbable-custom tabbable-parallel">
                        <ul class="nav nav-tabs">
                            <li class="active" data-type="new">
                                <a href="#new" data-toggle="tab"> New </a>
                            </li>
                            <li data-type="waiting">
                                <a href="#waiting" data-toggle="tab"> Waiting </a>
                            </li>
                            <li data-type="complete">
                                <a href="#completed" data-toggle="tab"> Completed </a>
                            </li>
                            <li data-type="kiv">
                                <a href="#kiv" data-toggle="tab"> KIV </a>
                            </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="tab-pane active" id="new">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-new" data-url="{{ route('workorder.data',['status'=> 'new']) }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="3%" class="text-center"> #</th>
                                            <th width="8%" class="text-center"> Title</th>
                                            <th width="10%" class="text-center"> Date Time</th>
                                            <th width="8%" class="text-center"> W.O.No</th>
                                            <th width="8%" class="text-center"> Type</th>
                                            <th width="10%" class="text-center"> Reg No</th>
                                            <th width="10%" class="text-center"> Assigned To</th>
                                            <th width="10%" class="text-center"> Estimation Time</th>
                                            <th width="10%" class="text-center"> Last Update By</th>
                                            <th width="9%" class="text-center"> Last Update</th>
                                            <th width="14%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="title" placeholder="Title">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="create_time" placeholder="Date Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="wo_num" placeholder="W.O.No">
                                            </td>
                                            <td>
                                                <select name="type" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="assign_to" placeholder="Assigned To">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="estimate_time" placeholder="Estimate Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="last_update_by" placeholder="Last Update By">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_update" placeholder="Last Update">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
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
                            <div class="tab-pane" id="waiting">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-waiting" data-url="{{ route('workorder.data',['status'=> 'waiting']) }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="3%" class="text-center"> #</th>
                                            <th width="8%" class="text-center"> Title</th>
                                            <th width="10%" class="text-center"> Date Time</th>
                                            <th width="8%" class="text-center"> W.O.No</th>
                                            <th width="8%" class="text-center"> Type</th>
                                            <th width="10%" class="text-center"> Reg No</th>
                                            <th width="10%" class="text-center"> Assigned To</th>
                                            <th width="10%" class="text-center"> Est Date/Time Of Completion</th>
                                            <th width="10%" class="text-center"> Last Update By</th>
                                            <th width="9%" class="text-center"> Last Update</th>
                                            <th width="14%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="title" placeholder="Title">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="create_time" placeholder="Date Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="wo_num" placeholder="W.O.No">
                                            </td>
                                            <td>
                                                <select name="type" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="assign_to" placeholder="Assigned To">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="estimate_time" placeholder="Estimate Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="last_update_by" placeholder="Last Update By">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_update" placeholder="Last Update">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
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
                            <div class="tab-pane" id="completed">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-complete" data-url="{{ route('workorder.data',['status'=> 'complete']) }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="3%" class="text-center"> #</th>
                                            <th width="8%" class="text-center"> Title</th>
                                            <th width="10%" class="text-center"> Date Time</th>
                                            <th width="8%" class="text-center"> W.O.No</th>
                                            <th width="8%" class="text-center"> Type</th>
                                            <th width="10%" class="text-center"> Reg No</th>
                                            <th width="10%" class="text-center"> Assigned To</th>
                                            <th width="10%" class="text-center"> Est Date/Time Of Completion</th>
                                            <th width="10%" class="text-center"> Last Update By</th>
                                            <th width="9%" class="text-center"> Last Update</th>
                                            <th width="14%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="title" placeholder="Title">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="create_time" placeholder="Date Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="wo_num" placeholder="W.O.No">
                                            </td>
                                            <td>
                                                <select name="type" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="assign_to" placeholder="Assigned To">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="estimate_time" placeholder="Estimate Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="last_update_by" placeholder="Last Update By">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_update" placeholder="Last Update">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
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
                            <div class="tab-pane" id="kiv">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-kiv" data-url="{{ route('workorder.data',['status'=> 'kiv']) }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="3%" class="text-center"> #</th>
                                            <th width="8%" class="text-center"> Title</th>
                                            <th width="10%" class="text-center"> Date Time</th>
                                            <th width="8%" class="text-center"> W.O.No</th>
                                            <th width="8%" class="text-center"> Type</th>
                                            <th width="10%" class="text-center"> Reg No</th>
                                            <th width="10%" class="text-center"> Assigned To</th>
                                            <th width="10%" class="text-center"> Est Date/Time Of Completion</th>
                                            <th width="10%" class="text-center"> Last Update By</th>
                                            <th width="9%" class="text-center"> Last Update</th>
                                            <th width="14%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="title" placeholder="Title">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="create_time" placeholder="Date Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="wo_num" placeholder="W.O.No">
                                            </td>
                                            <td>
                                                <select name="type" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="assign_to" placeholder="Assigned To">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="estimate_time" placeholder="Estimate Time">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="last_update_by" placeholder="Last Update By">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_update" placeholder="Last Update">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
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
                        @if(Auth::user()->hasAccess('workorder', 'add'))
                            <div class="action-toolbar">
                                <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                   href="{{ route('workorder.add') }}" >ADD</a>
                            </div>
                        @endif
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
    <script src="{{asset('assets/scripts/pages/workorder.js') }}" type="text/javascript"></script>
@endsection
