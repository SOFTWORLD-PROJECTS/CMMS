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
    @yield('header_style')
    <link href="{{asset('assets/css/components.css') }}" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/pages/login.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{asset('assets/img/logo.png') }}"/>

<body class=" login">
<div class="logo">
    <a href="javascript::">
        <img src="{{asset('assets/img/logo.png') }}" style="height: 70px;" alt=""/> </a>
</div>

<div class="content">
    <form class="login-form" action="{{route('login')}}" method="post">
        {{ csrf_field() }}
        <div class="form-title text-center">
            <span class="form-title">Centralised Machinery Monitoring System</span>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                   placeholder="Email" name="email"/></div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                   placeholder="Password" name="password"/></div>
        <div class="form-actions" style="margin-bottom: 15px;">
            <div class="pull-left">
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1"/>Remember me </label>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase">Login</button>
        </div>
    </form>
</div>

<script src="{{asset('assets/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
        type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/scripts/app.js') }}" type="text/javascript"></script>

<script src="{{asset('assets/scripts/pages/login.js') }}" type="text/javascript"></script>
</body>
</html>