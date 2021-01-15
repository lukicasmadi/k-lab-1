<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ secure_asset('template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('template/assets/css/forms/switches.css') }}">
    @routes
</head>
<body class="form">
    @yield('content')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ secure_asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ secure_asset('template/assets/js/authentication/form-2.js') }}"></script>

</body>
</html>