@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/machinery.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style=" background: #f3f3f4;">
                    <div class="tabbable-custom tabbable-parallel">
                        <ul class="nav nav-tabs ">
                            <li class="@if($type == 'machinery') active @endif">
                                <a href="#listing" data-toggle="tab"> Listing </a>
                            </li>
                            <li class="@if($type == 'type') active @endif">
                                <a href="#type" data-toggle="tab"> Type </a>
                            </li>
                            <li  class="@if($type == 'brand') active @endif">
                                <a href="#brand" data-toggle="tab"> Brand</a>
                            </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="tab-pane @if($type == 'machinery') active @endif" id="listing">
                                @if(Auth::user()->hasAccess('machinery', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('machinery.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-machinery" data-url="{{ route('machinery.machinerydata') }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="3%" class="text-center"> #</th>
                                            <th width="10%" class="text-center"> Type</th>
                                            <th width="10%" class="text-center"> Brand</th>
                                            <th width="10%" class="text-center"> Model</th>
                                            <th width="15%" class="text-center"> Register No.</th>
                                            <th width="15%" class="text-center"> ACC Code</th>
                                            <th width="10%" class="text-center"> Serial No</th>
                                            <th width="17%" class="text-center"> Purchase Date</th>
                                            <th width="10%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
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
                                                <select name="brand" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                                       name="reg_no" placeholder="Register No"></td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="acc_code" placeholder="ACC Code"></td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="serial_no" placeholder="Serial No"></td>
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="date_purchase" placeholder="Purchase Date">
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
                            <div class="tab-pane @if($type == 'type') active @endif" id="type">
                                @if(Auth::user()->hasAccess('machinery', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('machinery.type.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-type" data-url="{{ route('machinery.type.data') }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="25%" class="text-center"> Type</th>
                                            <th width="25%" class="text-center"> Description</th>
                                            <th width="25%" class="text-center"> ACC Code</th>
                                            <th width="20%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="type" placeholder="Type"></td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="description" placeholder="Description"></td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="acc_code" placeholder="ACC Code"></td>
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
                            <div class="tab-pane @if($type == 'brand') active @endif" id="brand">
                                @if(Auth::user()->hasAccess('machinery', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('machinery.brand.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-brand" data-url="{{ route('machinery.brand.data') }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="35%" class="text-center"> Brand</th>
                                            <th width="35%" class="text-center"> Description</th>
                                            <th width="25%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="brand" placeholder="Brand"></td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="description" placeholder="Description"></td>
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
    <script src="{{asset('assets/scripts/pages/machinery.js') }}" type="text/javascript"></script>
@endsection
