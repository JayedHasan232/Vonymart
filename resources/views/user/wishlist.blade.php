@extends('layouts.app')

@push('stylesheets')

@endpush

@push('scripts')

@endpush

@push('meta')
<title>{{ config('app.name', 'Laravel') }}</title>
@endpush

@push('schema')

@endpush

@section('content')
<section class="py-5">
    <div class="container-xl">
        <div class="">
            <div class="text-center">
                <h3 class="mb-5">Wishlist</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                @livewire('user.layout.sidebar')
            </div>

            <div class="col-md-9">
                <div class="row g-4">
                    @foreach($wishlist as $item)
                    <div class="col-md-4">
                        @livewire('app.component.products.product', ['product' => $item->product], key($item->id))
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection