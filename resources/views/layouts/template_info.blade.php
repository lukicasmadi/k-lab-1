<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISLAPOPS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/korlantas.png') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet"> -->
    <link href="{{ asset('template/assets/font/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/popbox.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/switches.css') }}">
    @routes
</head>
<script>

</script>
<body class="form">
<div class="">
    @yield('content')
    @include('include.footer_wrapper')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/switched.js') }}"></script>
    <script src="{{ asset('template/assets/js/popbox.js') }}"></script>
    <script src="{{ asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</div>
@stack('library_js')
@stack('page_js')
</body>
</html>