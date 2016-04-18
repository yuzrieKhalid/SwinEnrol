<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <title>Final Year Project</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />


    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('head_extra')
</head>
<body>
    <div class="wrapper">
        <div style="padding-bottom:40px;">
            @yield('content')
        </div>

        @yield('script_extra')
    </div>
</body>
</html>
