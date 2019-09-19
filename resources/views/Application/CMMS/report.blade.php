@extends('layouts.app')
@section('header_style')
    <link href="{{asset('assets/css/pages/report.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-content-body-wrapper no-padding">
        <div class="page-content-body no-padding">
            <div class="portlet light  bordered box-shadow" style="height: 100%;">
                <div class="portlet-body no-padding" style="height: 100%; background: #f3f3f4;">
                    <div class="row" style="height: 100%;">
                        <div class="col-md-12" style="padding-left: 50px;margin-top:50px;">
                            <span class="report uppercase">Report</span>
                        </div>
                        <div class="col-md-12" style="padding-left: 20%;padding-right: 10%; margin-top: 30px;">
                            @if(Auth::user()->hasAccess('report', 'edit'))
                                <div class="box-wrapper">
                                    <a href="{{route('report.wo-report')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/wo-report.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>W.O.Report</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('report.upcoming-pm-report')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/upcoming-report.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Upcoming P.M Report</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('report.upcoming-renewal-report')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/renewal-report.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Upcoming Renewal Report</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('report.expense-report')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/expense-report.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Expense Report</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('report.diesel-usage-report')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/diesal-usage-report.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Diesel Usage Report</span>
                                        </p>
                                    </a>
                                </div>
                                <div class="box-wrapper">
                                    <a href="{{route('report.diesel-stock-report')}}">
                                        <p class="text-center">
                                            <img src="{{ asset('assets/img/diesal-stock-report.png') }}">
                                        </p>
                                        <p class="text-center bold uppercase text-wrapper">
                                            <span>Diesel Stock Report</span>
                                        </p>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{asset('assets/scripts/pages/report.js') }}" type="text/javascript"></script>
@endsection
