@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/setting-docrunning.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="portlet light  bordered box-shadow" style="height: 100%;">
        <div class="portlet-body no-padding" style=" background: #f3f3f4;">
            <div class="tabbable-custom tabbable-parallel">
                <ul class="nav nav-tabs ">
                    <li class="active" style="width: 350px; background-color: white !important;">
                        <a href="#listing-add" data-toggle="tab" style="color: black !important;">
                            SETTING ->
                            DOC RUNNING NO.</a>
                    </li>
                </ul>
                <div class="tab-content no-padding" style=" border-top: 2px solid #f5f5f5;">
                    <div class="tab-pane active" id="listing-add">
                        <form action="{{route('setting.docrunning.save')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-offset-1 col-md-9" style="margin-top:25px;">
                                    @if(count($errors) > 0)
                                        <div class="row">
                                            <div class="alert alert-danger">
                                                <button class="close" data-close="alert"></button>
                                                You have some form errors. Please check below.
                                                <span data-notify="message" style="margin-top:5px;">
                                                    @foreach($errors->all() as $error)
                                                        <li><strong> {{$error}} </strong></li>
                                                    @endforeach </span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="table-scrollable">
                                        <table class="table table-striped table-hover" style=" border: none;">
                                            <thead>
                                            <tr>
                                                <th> DOCUMENT NAME</th>
                                                <th> PREFIX</th>
                                                <th> NEXT NUMBER</th>
                                                <th> DIGIT NUMBER</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td> Machinery</td>
                                                <td>
                                                    <input type="text" class="form-control" name="machinery[prefix]"
                                                           value="{{ $machinery ? $machinery->prefix : '' }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                           name="machinery[next_number]"
                                                           value="{{ $machinery ? sprintf('%0' . $machinery->digit_number . 'd', $machinery->next_number)  : '' }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                           name="machinery[digit_number]"
                                                           value="{{ $machinery ? $machinery->digit_number : '' }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Work Order</td>
                                                <td>
                                                    <input type="text" class="form-control" name="workorder[prefix]"
                                                           value="{{ $workorder ? $workorder->prefix : '' }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                           name="workorder[next_number]"
                                                           value="{{ $workorder ? sprintf('%0' . $workorder->digit_number . 'd', $workorder->next_number) : '' }}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"
                                                           name="workorder[digit_number]"
                                                           value="{{ $workorder ? $workorder->digit_number : '' }}">
                                                </td>
                                            </tr>
                                            {{--<tr>--}}
                                                {{--<td> Prevent Maintenance</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="text" class="form-control" name="premaintenance[prefix]"--}}
                                                           {{--value="{{ $premaintenance ? $premaintenance->prefix : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="number" class="form-control"--}}
                                                           {{--name="premaintenance[next_number]"--}}
                                                           {{--value="{{ $premaintenance ? sprintf('%0' . $premaintenance->digit_number . 'd', $premaintenance->next_number)  : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="number" class="form-control"--}}
                                                           {{--name="premaintenance[digit_number]"--}}
                                                           {{--value="{{ $premaintenance ? $premaintenance->digit_number : '' }}">--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td> Record</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="text" class="form-control" name="record[prefix]"--}}
                                                           {{--value="{{ $record ? $record->prefix : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="number" class="form-control" name="record[next_number]"--}}
                                                           {{--value="{{ $record ?  sprintf('%0' . $record->digit_number . 'd', $record->next_number) : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="number" class="form-control"--}}
                                                           {{--name="record[digit_number]"--}}
                                                           {{--value="{{ $record ? $record->digit_number : '' }}">--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td> Renewal</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="text" class="form-control" name="renewal[prefix]"--}}
                                                           {{--value="{{ $renewal ? $renewal->prefix : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="number" class="form-control"--}}
                                                           {{--name="renewal[next_number]"--}}
                                                           {{--value="{{ $renewal ? sprintf('%0' . $renewal->digit_number . 'd', $renewal->next_number) : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="number" class="form-control"--}}
                                                           {{--name="renewal[digit_number]"--}}
                                                           {{--value="{{ $renewal ? $renewal->digit_number : '' }}">--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td> Diesel</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="text" class="form-control"--}}
                                                           {{--name="diesel[prefix]"--}}
                                                           {{--value="{{ $diesel ? $diesel->prefix : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="text" class="form-control"--}}
                                                           {{--name="diesel[next_number]"--}}
                                                           {{--value="{{ $diesel ? sprintf('%0' . $diesel->digit_number . 'd', $diesel->next_number) : '' }}">--}}
                                                {{--</td>--}}
                                                {{--<td>--}}
                                                    {{--<input type="text" class="form-control"--}}
                                                           {{--name="diesel[digit_number]"--}}
                                                           {{--value="{{ $diesel ? $diesel->digit_number : '' }}">--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="action-toolbar">
                                @if(Auth::user()->hasAccess('setting', 'edit'))
                                <button type="submit" class="btn btn-danger btn-sm"
                                   style="width: 100px;border-radius:5px !important; margin-right: 15px;"
                                   >SAVE</button>
                                @endif
                                <a href="{{ route('setting') }}" class="btn btn-sm purple"
                                        style="width: 100px;border-radius:5px !important;">DISCARD
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/setting-docrunning.js') }}" type="text/javascript"></script>
@endsection
