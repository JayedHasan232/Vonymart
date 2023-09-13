@extends('layouts.app')

@push('meta')
<!-- Primary Meta Tags -->
<title>{{ config('app.name', 'Laravel') }} | {{ __( $sub_category->title ) }}</title>
<meta name="title" content="{{ __( $sub_category->title ) }}">
<meta name="description" property="og:description" content="{{ __( $sub_category->meta_description ) }}">
<meta name="keywords" content="{{ __( $sub_category->meta_keywords ) }}">

<!-- Open Graph / Facebook -->
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="{{ __( $sub_category->title ) }}">
<meta property="og:description" content="{{ __( $sub_category->meta_description ) }}">
<meta property="og:image" content="{{ asset('storage/' . $sub_category->image) }}">

<!-- Twitter -->
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="{{ __( $sub_category->title ) }}">
<meta property="twitter:description" content="{{ __( $sub_category->meta_description ) }}">
<meta property="twitter:image" content="{{ asset('storage/' . $sub_category->image) }}">
@endpush

@section('content')
<livewire:app.page.products.sub-category.index :sub_category="$sub_category" />
@endsection