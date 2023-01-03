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
    <meta property="twitter:site" content="@vonymar">
    <meta property="twitter:creator" content="@vonymar">

    @stack('schema')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
    @stack('stylesheets')
    @livewireStyles
</head>

<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    @stack('modals')
    @stack('scripts')
    @livewireScripts
</body>

</html>