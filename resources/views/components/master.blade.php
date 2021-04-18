<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tweety') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/toast.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toast.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
<div id="app">
    {{ $slot }}
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <script>
            Toast.add({
                text: '{{ \Illuminate\Support\Facades\Session::get('error') }}',
                color: '#F82D2D',
                autohide: true,
                delay: 5000
            });
        </script>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Toast.add({
                text: '{{ \Illuminate\Support\Facades\Session::get('success') }}',
                color: '#28a745',
                autohide: true,
                delay: 5000
            });
        </script>
    @endif
    <script src="https://unpkg.com/turbolinks"></script>
    @livewireScripts
</div>
</body>
</html>
