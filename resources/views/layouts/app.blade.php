<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('storage/'.$appConfiguration->favicon)}}" type="image/x-icon">

    <title>Alokmart - Online Shopping In Bangladesh</title>
    <meta name="title" content="Alokmart - Online Shopping In Bangladesh">
    <meta name="description"
        content="Alokmart is a trusted, reliable, and the biggest online shopping center in Bangladesh. Fashion, jewelry, beauty, electronics, and others.">

    @stack('meta')

    <!-- Common Meta -->
    <meta name="author" content="">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <meta property="og:type" content="website">
    <meta property="fb:app_id" content="">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@alokmart">
    <meta property="twitter:creator" content="@alokmart">

    @stack('schema')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    @if(env('APP_ENV') == 'production')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    @else
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    @stack('stylesheets')
    @livewireStyles
</head>

<body>
    <div id="app">
        @livewire('app.layout.navbar')
        {{-- @livewire('app.layout.menubar') --}}

        <main>
            @yield('content')
        </main>

        @livewire('app.layout.subscriber-form')
        @livewire('app.layout.footer')
    </div>

    @if(env('APP_ENV') == 'production')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    @else
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    @endif

    @stack('modals')
    @stack('scripts')
    @livewireScripts
</body>

</html>