<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Controle de Estoque 1.0') }}@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.png')}}" />

    @include('layouts.styles')
</head>
<body>
    <div id="app">
        <div class="page-wrapper toggled default-theme bg1">
            @include('layouts.sidebar')
            <!-- page-content  -->
            <main class="page-content pt-2">
                @yield('content')
            </main>
            <!-- page-content" -->
        </div>
    </div>

@include('layouts.scripts')
</body>
</html>
