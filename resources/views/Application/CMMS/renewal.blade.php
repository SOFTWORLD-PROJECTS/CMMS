@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/renewal.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style=" background: #f3f3f4;">
                    <div class="tabbable-custom tabbable-parallel">
                        <ul class="nav nav-tabs ">
                            <li class="active" data-type="upcoming">
                                <a href="#upcoming" data-toggle="tab"> Upcoming </a>
                            </li>
                            <li data-type="complete">
                                <a href="#completed" data-toggle="tab"> Completed </a>
                            </li>
                            <li data-type="preset">
                                <a href="#preset" data-toggle="tab"> Preset </a>
                            </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="tab-pane active" id="upcoming">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-upcoming"
                                           data-url="{{route('renewal.data.upcoming')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center"> #</th>
                                            <th width="10%" class="text-center"> Reg No</th>
                                            <th width="15%" class="text-center"> Insurance</th>
                                            <th width="10%" class="text-center"> Day Left</th>
                                            <th width="15%" class="text-center"> Road Tax</th>
                                            <th width="10%" class="text-center"> Day Left</th>
                                            <th width="15%" class="text-center"> Puspakom</th>
                                            <th width="10%" class="text-center"> Day Left</th>
                                            <th width="10%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="insurance" placeholder="Insurance">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="insurance_left" placeholder="Day Left">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="road_tax" placeholder="Road Tax">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="road_tax_left" placeholder="Day Left">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="puspakom" placeholder="Puspakom">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="puspakom_left" placeholder="Day Left">
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
                                    <table class="table table-striped table-hover " id="datatable-complete"
                                           data-url="{{route('renewal.data.complete')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="4%" class="text-center"> #</th>
                                            <th width="12%" class="text-center"> Reg No</th>
                                            <th width="12%" class="text-center"> Insurance</th>
                                            <th width="12%" class="text-center"> Upload</th>
                                            <th width="12%" class="text-center"> Road Tax</th>
                                            <th width="12%" class="text-center"> Upload</th>
                                            <th width="12%" class="text-center"> Puspakom</th>
                                            <th width="12%" class="text-center"> Upload</th>
                                            <th width="12%" class="text-center"> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="preset">
                                @if(Auth::user()->hasAccess('renewal', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('renewal.add') }}">ADD</a>
                                    </div>
                                @endif
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-preset"
                                           data-url="{{route('renewal.data.preset')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="3%" class="text-center"> #</th>
                                            <th width="8%" class="text-center"> Reg No</th>
                                            <th width="8%" class="text-center"> Insurance</th>
                                            <th width="8%" class="text-center"> Routine</th>
                                            <th width="10%" class="text-center"> Last Renewal</th>
                                            <th width="10%" class="text-center"> Road Tax</th>
                                            <th width="8%" class="text-center"> Routine</th>
                                            <th width="10%" class="text-center"> Last Renewal</th>
                                            <th width="10%" class="text-center"> Puspakom</th>
                                            <th width="8%" class="text-center"> Routine</th>
                                            <th width="10%" class="text-center"> Last Renewal</th>
                                            <th width="7%" class="text-center"> Action</th>
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
    <input type="hidden" id="renewal-url" name="url">
    <input type="hidden" id="renewal-id" name="id">
    <input type="hidden" id="renewal-type" name="type">
    <input type="file" id="renewal-file" name="file" style="display: none;">
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/renewal.js') }}" type="text/javascript"></script>
@endsection
