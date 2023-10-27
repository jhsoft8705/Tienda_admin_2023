<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistema Alpaca Perú</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('favicon.ico') }}" />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    @yield('content')
  </div>
  @include('blocks.firebase-app')
  <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>