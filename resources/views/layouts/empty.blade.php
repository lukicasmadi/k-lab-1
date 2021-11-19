<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="env_var" content="{{ config('app.env') }}">
    <title>SISLAPOPS</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/img/korlantas.png') }}"/>
    @stack('library_css')
    @stack('page_css')
</head>
<body>
    @yield('content')
</body>
</html>