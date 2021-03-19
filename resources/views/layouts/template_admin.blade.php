<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SISLAPOPS</title>
    <link rel="icon" type="image/x-icon" href="{{ secure_asset('template/assets/img/korlantas.png') }}"/>
    <link href="{{ secure_asset('template/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ secure_asset('template/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{{ secure_asset('template/assets/font/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/fontawesome5.15.1/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('template/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    @stack('library_css')
    @stack('page_css')
    @routes
</head>
<body class="sidebar-noneoverflow">
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

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="col-md-12">
                @include('flash::message')
            </div>
            @yield('content')
            @include('include.footer_wrapper')
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ secure_asset('template/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('template/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="{{ secure_asset('template/assets/js/custom.js') }}"></script>
    <script src="{{ secure_asset('template/globalfunction.js') }}"></script>
    <script src="{{ secure_asset('template/assets/js/app.js') }}"></script>
    <script src="{{ secure_asset('template/plugins/select2/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    @stack('library_js')
    @stack('page_js')
</body>
</html>