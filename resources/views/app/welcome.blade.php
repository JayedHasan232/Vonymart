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

@foreach($banners as $banner)
@if($banner->position == 1)
<livewire:app.page.home.banner :banner="$banner" />
@endif
@endforeach

<livewire:app.page.home.trending qty="6" link="visible" />

@foreach($banners as $banner)
@if($banner->position == 2)
<livewire:app.page.home.banner :banner="$banner" />
@endif
@endforeach

<livewire:app.page.home.recent qty="6" link="visible" />

@foreach($banners as $banner)
@if($banner->position == 3)
<livewire:app.page.home.banner :banner="$banner" />
@endif
@endforeach

<livewire:app.page.home.all-products qty="6" link="visible" />

@foreach($banners as $banner)
@if($banner->position == 4)
<livewire:app.page.home.banner :banner="$banner" />
@endif
@endforeach

@endsection