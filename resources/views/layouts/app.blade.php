<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Centralised Machinery Monitoring System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
    @yield('header_style')
    <link href="{{asset('assets/css/components.css') }}" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="root-path" content="{{ asset('/') }}">
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{route('home')}}">
                <img src="{{asset('assets/img/logo.png') }}" alt="logo" class="logo-default"/>
            </a>
        </div>
        <div class="page-top">
            <div class="top-menu" style="float: none;">
                @include('partials.top-menu')
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            @include('partials.sidebar')
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
        <div class="page-footer">
            @include('partials.footer')
        </div>
    </div>
</div>
<div class="modal fade" id="image-view-modal" data-width="600">
    <div class="modal-dialog">
        <div class="modal-content" style="box-shadow: none;border: none;">
            <div class="modal-body text-center" style="min-height: 400px;">
                    <img src="{{asset('assets/img/upload_img_big.png')}}" style="min-height: 350px;min-width: 350px;max-width:550px;height:400px;">
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
        type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
@yield('footer_script')
<script src="{{asset('assets/scripts/app.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/scripts/custom.js') }}" type="text/javascript"></script>
</body>
</html>