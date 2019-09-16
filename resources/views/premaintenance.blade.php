@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-modal/css/bootstrap-modal.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/premaintenance.css') }}" rel="stylesheet" type="text/css"/>
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
                            <li data-type="post">
                                <a href="#post" data-toggle="tab"> Post </a>
                            </li>
                            <li data-type="preset">
                                <a href="#preset" data-toggle="tab"> Preset </a>
                            </li>
                            <li data-type="kiv">
                                <a href="#kiv" data-toggle="tab"> KIV </a>
                            </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <div class="tab-pane active" id="upcoming">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-upcoming"
                                           data-url="{{route('premaintenance.data.upcoming')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center">#</th>
                                            <th width="10%" class="text-center">Type</th>
                                            <th width="15%" class="text-center"> Reg No</th>
                                            <th width="16%" class="text-center"> Current</th>
                                            <th width="12%" class="text-center"> Left</th>
                                            <th width="15%" class="text-center"> Last Serviced</th>
                                            <th width="15%" class="text-center"> Service Type</th>
                                            <th width="17%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
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
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="current" placeholder="Current">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="left" placeholder="Left">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_service_date" placeholder="Last Service Date">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="service_type" placeholder="Service Type">
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
                            <div class="tab-pane" id="post">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-post"
                                           data-url="{{ route('premaintenance.data.post') }}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center">#</th>
                                            <th width="10%" class="text-center">Type</th>
                                            <th width="15%" class="text-center"> Reg No</th>
                                            <th width="10%" class="text-center"> Current</th>
                                            <th width="10%" class="text-center"> Left</th>
                                            <th width="15%" class="text-center"> Last Serviced</th>
                                            <th width="15%" class="text-center"> Service Type</th>
                                            <th width="10%" class="text-center"> Status</th>
                                            <th width="15%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
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
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="current" placeholder="Current">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="left" placeholder="Left">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_service_date" placeholder="Last Service Date">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="service_type" placeholder="Service Type">
                                            </td>
                                            <td>
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
                            <div class="tab-pane" id="preset">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-preset"
                                           data-url="{{route('premaintenance.data.preset')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="4%" class="text-center">#</th>
                                            <th width="10%" class="text-center">Type</th>
                                            <th width="10%" class="text-center"> Brand</th>
                                            <th width="10%" class="text-center"> Reg No</th>
                                            <th width="14%" class="text-center">Last Serviced Date</th>
                                            <th width="10%" class="text-center"> Routine</th>
                                            <th width="10%" class="text-center"> Service Unit</th>
                                            <th width="10%" class="text-center"> Service Type</th>
                                            <th width="10%" class="text-center"> Status</th>
                                            <th width="12%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
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
                                                <select name="brand" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5"
                                                     data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm"
                                                           readonly
                                                           name="last_service_date" placeholder="Last Service Date">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control form-filter input-sm"
                                                       name="routine_service" placeholder="Routine Service">
                                            </td>
                                            <td>
                                                <select name="service_unit" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    <option value="km">Km</option>
                                                    <option value="hour">Hour</option>
                                                    <option value="date">Date</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="service_type" placeholder="Service Type">
                                            </td>
                                            <td>
                                            </td>
                                            <td>
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
                                @if(Auth::user()->hasAccess('premaintenance', 'add'))
                                    <div class="action-toolbar">
                                        <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important;"
                                           href="{{ route('premaintenance.add') }}">ADD</a>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane" id="kiv">
                                <div class="table-container">
                                    <table class="table table-striped table-hover " id="datatable-kiv"
                                           data-url="{{route('premaintenance.data.kiv')}}">
                                        <thead>
                                        <tr role="row" class="heading">
                                            <th width="5%" class="text-center">#</th>
                                            <th width="12%" class="text-center">Type</th>
                                            <th width="12%" class="text-center">Brand</th>
                                            <th width="15%" class="text-center">Reg No</th>
                                            <th width="11%" class="text-center">By</th>
                                            <th width="15%" class="text-center">Date</th>
                                            <th width="15%" class="text-center">Reason</th>
                                            <th width="10%" class="text-center"> Action</th>
                                        </tr>
                                        <tr role="row" class="filter">
                                            <td>
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
                                                <select name="brand" class="form-control form-filter input-sm">
                                                    <option value="">Select</option>
                                                    @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="reg_no" placeholder="Reg No">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="last_update_by" placeholder="By">
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
                                                       name="reason" placeholder="Reason">
                                            </td>
                                            <td>
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
    <div id="kiv-modal" class="modal fade" data-width="600" data-backdrop="static">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">KIV Reason</h4>
        </div>
        <form class="form-horizontal" id="kiv-form" action="" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-2 control-label bold">Reason</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" placeholder="Reason" rows="3"
                                              name="reason"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger" style="width:150px;">Close
                    </button>
                    <button type="submit" class="btn green" style="width:150px;">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}"
            type="text/javascript"></script>
    <script src="{{asset('assets/plugins/bootstrap-modal/js/bootstrap-modal.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/premaintenance.js') }}" type="text/javascript"></script>
@endsection
