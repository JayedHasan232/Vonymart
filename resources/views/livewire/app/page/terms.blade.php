@push('meta')
<!-- Primary Meta Tags -->
<title>{{ 'Terms & Conditions | ' . config('app.name', 'Laravel') }}</title>
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

<section class="py-5">
    <div class="{{ env('BS_CONTAINER') }}">
        <article>{!! $article ?? '' !!}</article>
    </div>
</section>