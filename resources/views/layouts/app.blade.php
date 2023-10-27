<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema Moda Deyabu</title>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/notificaciones/notifications.css') }}">
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    @yield('styles')
    <script type="text/javascript">var APP_URL = {!! json_encode(url('/')) !!}</script>
</head>
<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('blocks.header')
            <div class="main-sidebar sidebar-style-2">
                @include('blocks.sidebar')
            </div>
            <div class="main-content">
                @yield('content')
            </div>
            @include('blocks.footer')
        </div>
    </div>    
    
    <script src="{{ asset('assets/js/app.js') }}"></script>


    @if(!request()->is('banners*'))
    <script src="{{ asset('assets/notificaciones/notifications.js') }}"></script>
    @include('blocks.firebase-app')
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>

    <script>
        var ventas_vista = {{ request()->is('ventas*') ? 'true' : 'false' }};
    </script>
    <script src="{{ asset('assets/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @endif
    
    @yield('scripts')
</body>
</html>