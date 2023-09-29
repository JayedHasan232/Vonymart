<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('storage/'.$appConfiguration->favicon)}}" type="image/x-icon">

    <title>Amidmart - Online Shopping In Bangladesh</title>
    <meta name="title" content="Amidmart - Online Shopping In Bangladesh">
    <meta name="description"
        content="Amidmart is a trusted, reliable, and the biggest online shopping center in Bangladesh. Fashion, jewelry, beauty, electronics, and others.">

    @stack('meta')

    <!-- Common Meta -->
    <meta name="author" content="">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <meta property="og:type" content="website">
    <meta property="fb:app_id" content="">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@amidmart">
    <meta property="twitter:creator" content="@amidmart">
    <meta name="google-site-verification" content="fXS6cgZZYHd59V1hLfyuHAOqp6IjwdtYk1T3mF4quPM" />
    <meta name="msvalidate.01" content="100D1B07279F130294AF9219A645BFFF" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1XW704GL2D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-1XW704GL2D');
    </script>

    @stack('schema')

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    @stack('modals')
    @stack('scripts')
    @livewireScripts
</body>

</html>