@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/setting-preset.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 250px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING ->
                            PRESET</a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="table-container">
                            <table class="table table-striped table-hover " id="datatable">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="5%" class="text-center"> #</th>
                                    <th width="16%" class="text-center"> Code</th>
                                    <th width="16%" class="text-center"> Name</th>
                                    <th width="16%" class="text-center"> Location</th>
                                    <th width="16%" class="text-center"> Supplier</th>
                                    <th width="20%" class="text-center"> Service Company</th>
                                    <th width="11%" class="text-center"> Action</th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="name" placeholder="Name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="code" placeholder="Code">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="name" placeholder="Name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="location" placeholder="Location">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="supplier" placeholder="Supplier">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="service_company" placeholder="Service Company">
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
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/setting-preset.js') }}" type="text/javascript"></script>
@endsection
