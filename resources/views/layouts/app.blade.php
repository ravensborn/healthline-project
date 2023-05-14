<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="HealthLine Dashboard">
    <meta name="author" content="Yad Hoshyar">
    <meta name="keywords" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{  config('env.APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('adminkit/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<body>
    <div>
        <main class="py-4">

            @yield('content')
        </main>
    </div>


    <script src="{{ asset('adminkit/js/app.js') }}"></script>
</body>
</html>
