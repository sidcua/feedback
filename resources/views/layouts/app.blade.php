<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'FMS')</title>
        <link rel="icon" href="{{ asset('storage/chedlogo.png') }}" type="image/x-icon" />
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        @yield('content')

        <!-- Scripts -->
        <script src="{{ asset('js/swal.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        @yield('scripts')
        @yield('footer')
    </body>
</html>
