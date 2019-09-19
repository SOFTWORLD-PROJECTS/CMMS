@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/diesal.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style=" background: #f3f3f4;">
                    <div class="tabbable-custom tabbable-parallel">
                        <ul class="nav nav-tabs ">
                            <li class="@if($show_type == 'diesel') active @endif">
                                <a href="#usage" data-toggle="tab"> Usage </a>
                            </li>
                            <li class="@if($show_type == 'stock') active @endif">
                                <a href="#stocks" data-toggle="tab"> Stocks </a>
                            </li>
                            <li class="@if($show_type == 'request') active @endif">
                                <a href="#request" data-toggle="tab"> Request </a>
                            </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="tab-pane @if($show_type == 'diesel') active @endif" id="usage">
                                @if(Auth::user()->hasAccess('diesal', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('diesal.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-usage"
                                           data-url="{{route('diesal.data.usage')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="18%" class="text-center"> Date</th>
                                            <th width="15%" class="text-center"> Month / Year</th>
                                            <th width="10%" class="text-center"> Type</th>
                                            <th width="15%" class="text-center"> Register No</th>
                                            <th width="12%" class="text-center"> By</th>
                                            <th width="15%" class="text-center"> Total Usage(litres)</th>
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
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm">
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
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Register No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="by" placeholder="By">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="litres" placeholder="Total Usage">
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
                            <div class="tab-pane @if($show_type == 'stock') active @endif" id="stocks">
                                @if(Auth::user()->hasAccess('diesal', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('diesal.stock.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-stocks"
                                           data-url="{{route('diesal.data.stock')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="15%" class="text-center"> Date</th>
                                            <th width="20%" class="text-center"> Supplier</th>
                                            <th width="15%" class="text-center"> Purchased</th>
                                            <th width="10%" class="text-center"> Actual</th>
                                            <th width="10%" class="text-center"> Variance</th>
                                            <th width="10%" class="text-center"> Balance</th>
                                            <th width="15%" class="text-center"> Action</th>
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
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="supplier" placeholder="Supplier">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="purchased" placeholder="Purchased">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="actual" placeholder="Actual">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="variance" placeholder="Variance">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="balance" placeholder="Balance">
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
                            <div class="tab-pane  @if($show_type == 'request') active @endif" id="request">
                                @if(Auth::user()->hasAccess('diesal', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('diesal.request.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-request"
                                           data-url="{{route('diesal.data.request')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="10%" class="text-center"> Request No</th>
                                            <th width="10%" class="text-center"> Date</th>
                                            <th width="10%" class="text-center"> By</th>
                                            <th width="15%" class="text-center"> Remaining (CM)</th>
                                            <th width="15%" class="text-center"> Remaining (Litres)</th>
                                            <th width="15%" class="text-center"> QTY Request(Litres)</th>
                                            <th width="8%" class="text-center"> Status</th>
                                            <th width="12%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="request_no" placeholder="Request No">
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
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="last_update_by" placeholder="By">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="remaining_cm" placeholder="Remaining (CM)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="remaining_litre" placeholder="Remaining (Litres)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="request_quality" placeholder="QTY Request (Litres)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="status" placeholder="Status">
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
    <script src="{{asset('assets/scripts/pages/diesal.js') }}" type="text/javascript"></script>
@endsection
