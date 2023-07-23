@extends('layouts.app')

@push('meta')
<!-- Primary Meta Tags -->
<title>{{ config('app.name', 'Laravel') }} | {{ __( $product->title ) }}</title>
<meta name="title" content="{{ __( $product->title ) }}">
<meta name="description" property="og:description" content="{{ __( $product->meta_description ) }}">
<meta name="keywords" content="{{ __( $product->meta_keywords ) }}">

<!-- Open Graph / Facebook -->
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="{{ __( $product->title ) }}">
<meta property="og:description" content="{{ __( $product->meta_description ) }}">
<meta property="og:image" content="{{ asset('storage/' . $product->image) }}">

<!-- Twitter -->
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="{{ __( $product->title ) }}">
<meta property="twitter:description" content="{{ __( $product->meta_description ) }}">
<meta property="twitter:image" content="{{ asset('storage/' . $product->image) }}">
@endpush

@section('content')
<livewire:app.page.products.show :product="$product" />
@endsection