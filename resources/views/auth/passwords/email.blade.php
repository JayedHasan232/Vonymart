@extends('layouts.guest')

@section('content')
<div class="{{ env('BS_CONTAINER') }}">
    <div class="auth">

        <a class="logo" href="{{ url('/') }}">
            <img src="https://evaly.com.bd/static/images/logo_b&w.svg" alt="{{ config('app.name', 'Laravel') }}">
        </a>

        <div class="box">

            <h1 class="header">{{ __('Reset Password') }}</h1>

            <form class="body" method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ex: email@gmail.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn bg-accent text-white rounded-pill px-5">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection