<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tweety') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <section class="px-4 container m-auto">
        <main>
            <div class="lg:flex justify-between">
                {{-- Second sidebar --}}
                <div class="lg:w-1/6 xl:1/5 pt-4">
                    <header class="mb-3">
                        <h1>
                            <img src="/images/logo.svg" alt="Logo">
                        </h1>
                    </header>
                    @include('_sidebar-links')
                </div>
                {{-- Content --}}
                <div class="lg:flex-1 lg:px-4 pt-4 border-l border-r" style="max-width: 700px;">
                    @yield('content')
                </div>
                {{--Third sidebar--}}
                <div class="lg:w-1/4 xl:w-1/5 pt-4" style="max-width: 300px">
                    @include('_following-list')
                    <br>
                    @include('_who-to-follow-list')
                </div>
            </div>
        </main>
    </section>
</div>
</body>
</html>
