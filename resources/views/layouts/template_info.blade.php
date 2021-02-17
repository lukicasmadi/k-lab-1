<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Korlantas Login</title>
    <link rel="icon" type="image/x-icon" href="{{ secure_asset('template/assets/img/korlantas.png') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet"> -->
    <link href="{{ secure_asset('template/assets/font/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/popbox.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/switches.css') }}">
</head>
<script>
wReady=function(f,w){var r=document.readyState;w||r!="loading"?r!="complete"?window.addEventListener("load",function(){f(3)}):f(3):document.addEventListener("DOMContentLoaded",function(){f(2)&&wReady(f)})}
doInit=function(f,w){(w>1||(w&&document.readyState=="loading")||f(1))&&wReady(f,w>1)}
</script>
<body class="form">
<div class="">
    @yield('content')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ secure_asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('template/assets/js/popbox.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</div>
<div id="footer-login">Sistem pelaporan operasi online LALU LINTAS | Korlantas Polri &copy; 2021</div>
<script>
doInit(function() {
  if (typeof $=="undefined") return 1;

  PopBox.init({
    auto_show: true,         // in milliseconds. 15000 milliseconds = 15 seconds. 0 = disabled.
    auto_close: 60000,        // in milliseconds. 60000 = 60 seconds. 0 = disabled.
    show_on_scroll_start: 48, // starting scroll position in percents, between 0% and 100%. Both 0 = disabled.
    show_on_scroll_end: 52,   // ending scroll position. Eg 40..60 means that popbox will appear when any part of page between 40% and 60% is appeared in the viewport.
    closeable_on_dimmer: false,
    auto_start_disabled: false,
  });
}, 1);
</script>
</body>
</html>