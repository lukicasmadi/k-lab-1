<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ secure_asset('template/assets/img/favicon.ico') }}"/>
    <link href="{{ secure_asset('template/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ secure_asset('template/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ secure_asset('template/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ secure_asset('template/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ secure_asset('template/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @routes
</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    @include('include.header')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('include.top_bar')

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                @include('include.page_header')

                @yield('content')

                @include('include.footer_wrapper')

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ secure_asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('template/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ secure_asset('template/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ secure_asset('template/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ secure_asset('template/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ secure_asset('template/assets/js/dashboard/dash_2.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>