<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SISLAPOPS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/korlantas.png') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet"> -->
    <link href="{{ asset('template/assets/font/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/forms/switches.css') }}">
    <script>
    // function to set a given theme/color-scheme
            function setTheme(themeName) {
                localStorage.setItem('theme', themeName);
                document.documentElement.className = themeName;
            }

            // function to toggle between light and dark theme
            function toggleTheme() {
                if (localStorage.getItem('theme') === 'theme-dark') {
                    setTheme('theme-light');
                } else {
                    setTheme('theme-dark');
                }
            }

            // Immediately invoked function to set the theme on initial load
            (function () {
                if (localStorage.getItem('theme') === 'theme-dark') {
                    setTheme('theme-dark');
                    document.getElementById('slider').checked = false;
                } else {
                    setTheme('theme-light');
                document.getElementById('slider').checked = true;
                }
            })();
    </script>
</head>
<body class="form">
<div class="">
    @yield('content')
    @include('include.footer_wrapper')
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</div>
@stack('page_js')
</body>
</html>