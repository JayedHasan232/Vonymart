@extends('layouts.app')

@push('meta')
    <!-- Primary Meta Tags -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="title" content="">
    <meta name="description" property="og:description" content="">
    <meta name="keywords" content="">

    <!-- Open Graph / Facebook -->
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:url" content="">
    <meta property="twitter:title" content="">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="">
@endpush

@section('content')
    <livewire:app.page.home.hero />
    <livewire:app.page.home.categories />
    <livewire:app.page.home.trending qty="4" link="visible" classNames="bg-great" />
    <livewire:app.page.home.recent qty="4" link="visible" />
@endsection
