@extends('layouts.guest')

@section('content')
<div class="{{ env('BS_CONTAINER') }}">
    <div class="auth">

        <a class="logo" href="{{ url('/') }}">
            <img src="{{asset('storage/'.$appConfiguration->logo)}}" alt="{{ config('app.name', 'Laravel') }}">
        </a>

        <div class="box">

            <h1 class="header">{{ __('Register') }}</h1>

            <form class="body" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>

                    <div class="">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone">{{ __('Phone Number') }}</label>

                    <div class="">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group d-flex justify-content-center align-items-center gap-3">
                    <button type="submit" class="btn bg-accent rounded-pill px-5">
                        {{ __('Register') }}
                    </button>

                    @if (Route::has('login'))
                    <a class="text-muted" href="{{ route('login') }}">Login</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection