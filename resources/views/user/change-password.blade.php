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
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mb-5">Change Password</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                @livewire('user.layout.sidebar')
            </div>

            <div class="col-12 col-md-9 col-lg-8 offset-lg-1">
                @livewire('user.change-password')
            </div>
        </div>
    </div>
</section>
@endsection