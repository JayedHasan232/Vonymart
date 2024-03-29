@extends('layouts.guest')

@section('content')
<div class="{{ env('BS_CONTAINER') }}">
    <div class="auth">

        <a class="logo" href="{{ url('/') }}">
            <img src="{{asset('storage/'.$appConfiguration->logo)}}" alt="{{ config('app.name', 'Laravel') }}">
        </a>

        <div class="box">

            <h1 class="header">{{ __('Login') }}</h1>

            <form class="body" method="POST" action="{{ route('login') }}">
                @csrf

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
                    <label for="password">
                        {{ __('Password') }}
                        @if (Route::has('password.request'))
                        <a class="ms-1 text-primary" href="{{ route('password.request') }}"
                            title="{{ __('Forgot Your Password?') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                            </svg>
                        </a>
                        @endif
                    </label>

                    <div class="">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group d-flex justify-content-center align-items-center gap-3">
                    <button type="submit" class="btn bg-accent rounded-pill px-5">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('register'))
                    <a class="text-muted" href="{{ route('register') }}">Register</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection