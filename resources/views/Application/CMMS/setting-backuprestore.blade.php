@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/setting-backuprestore.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 350px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING ->
                            BACKUP FILENAME</a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="table-container">
                            <table class="table table-striped table-hover " id="datatable"
                                   data-url="{{route('setting.data.backuprestore')}}">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="10%" class="text-center"> #</th>
                                    <th width="30%" class="text-center"> Backup File Name</th>
                                    <th width="30%" class="text-center"> Date</th>
                                    <th width="30%" class="text-center"> Action</th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="name" placeholder="Backup File Name">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="create_time" placeholder="Date">
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
                        <div class="action-toolbar">
                            @if(Auth::user()->hasAccess('setting', 'add'))
                                <a class="btn btn-danger btn-sm"
                                   style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                                   href="{{ route('setting.backuprestore.add') }}">BACKUP</a>
                            @endif
                            <a class="btn btn-sm dark" style="width: 100px;border-radius:5px !important;"
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
    <script src="{{asset('assets/scripts/pages/setting-backuprestore.js') }}" type="text/javascript"></script>
@endsection
