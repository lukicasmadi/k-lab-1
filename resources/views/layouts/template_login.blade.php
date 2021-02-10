<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Korlantas Login</title>
    <link rel="icon" type="image/x-icon" href="{{ secure_asset('template/assets/img/korlantas.png') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet"> -->
    <link href="{{ secure_asset('template/assets/font/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/switches.css') }}">
</head>
<body class="form">
<div class="overflow">
    @yield('content')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ secure_asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</div>
<div id="footer-login">Sistem pelaporan operasi online LALU LINTAS | Korlantas Polri &copy; 2021</div>
</body>
</html>