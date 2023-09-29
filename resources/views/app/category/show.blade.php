@extends('layouts.app')

@push('meta')
<!-- Primary Meta Tags -->
<title>{{ config('app.name', 'Laravel') }} | {{ __( $category->title ) }}</title>
<meta name="title" content="{{ __( $category->title ) }}">
<meta name="description" property="og:description" content="{{ __( $category->meta_description ) }}">
<meta name="keywords" content="{{ __( $category->meta_keywords ) }}">

<!-- Open Graph / Facebook -->
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:title" content="{{ __( $category->title ) }}">
<meta property="og:description" content="{{ __( $category->meta_description ) }}">
<meta property="og:image" content="{{ asset('storage/' . $category->image) }}">

<!-- Twitter -->
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="{{ __( $category->title ) }}">
<meta property="twitter:description" content="{{ __( $category->meta_description ) }}">
<meta property="twitter:image" content="{{ asset('storage/' . $category->image) }}">
@endpush

@section('content')
<section class="section">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="sec-head d-block">
            <div class="tw-flex tw-items-center tw-gap-2">
                <a href="{{ route('welcome') }}" class="tw-flex tw-items-center tw-gap-1">
                    {{ __( 'Home' ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
                <a href="{{ route('departments.index') }}" class="tw-flex tw-items-center tw-gap-1">
                    {{ __( 'Categories' ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
            <h2 class="sec-title mt-2">{{ __( $category->title ) }}</h2>
        </div>

        <div class="row g-4">
            @foreach($category->sub_categories as $sub_category)
            <div class="col-6 col-md-3">
                @livewire('app.component.products.sub-category', ['sub_category' => $sub_category])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection