@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/css/pages/setting-usermanage.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 350px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING ->
                            USER MANAGEMENT</a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <div class="table-container">
                            <table class="table table-striped table-hover " id="datatable-usermanage" data-url="{{ route('setting.data.usermanage') }}">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="5%" class="text-center"> #</th>
                                    <th width="15%" class="text-center"> Name</th>
                                    <th width="15%" class="text-center"> Position</th>
                                    <th width="20%" class="text-center"> Department</th>
                                    <th width="20%" class="text-center"> Email</th>
                                    <th width="15%" class="text-center"> Status</th>
                                    <th width="10%" class="text-center"> Action</th>
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
                                               name="position" placeholder="Position">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm"
                                               name="department" placeholder="Department">
                                    </td>
                                    <td>
                                        <input type="email" class="form-control form-filter input-sm"
                                               name="email" placeholder="Email">
                                    </td>
                                    <td>
                                        <select class="form-control form-filter input-sm" name="status">
                                            <option value="">Select</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
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
        <div class="action-toolbar">
            @if(Auth::user()->hasAccess('setting', 'add'))
                <a class="btn btn-danger btn-sm" style="width: 100px;border-radius:5px !important; margin-right: 15px;" href="{{ route('setting.usermanage.add') }}">ADD</a>
            @endif
            <a class="btn btn-sm purple" style="width: 100px;border-radius:5px !important;"
               href="{{ route('setting.usermaintain') }}">DISCARD</a>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/datatable.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/datatables.min.js' )}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js' )}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/scripts/pages/setting-usermanage.js') }}" type="text/javascript"></script>
@endsection
