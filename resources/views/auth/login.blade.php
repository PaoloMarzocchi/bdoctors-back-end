@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">

        <div class="login_form shadow mt-4">
          <div class="form_background"></div>
          <div class="form_body">

            <h1 class="form_title text-center display-4 fw-bold mb-5 my_primary">{{ __('Login') }}</h1>

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="col-12">
                <label for="email" class="form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="mb-4 inputWrapper">

                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @else value="{{ old('email') }}" @endif
                    required autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="col-12 ">
                <label for="password" class="form-label text-md-right">{{ __('Password') }}</label>

                <div class="inputWrapper">

                  <input id="password" type="password" class="mb-1 form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password"
                    @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @else value="{{ old('password') }}" @endif>

                  <button type="button" class="showPassword">
                    <i class="fa-solid fa-eye"></i>
                    <i class="fa-solid fa-eye-slash d-none"></i>
                  </button>
                </div>

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                @if (Route::has('password.request'))
                  <a class="text-dark" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif

              </div>

              <div class="col-md-6">
                <div class="my-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ isset($_COOKIE['email']) || old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="mb-4">
                  <button type="submit" class="btn my_btn_primary px-4 rounded-pill w-100">
                    {{ __('Login') }}
                  </button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @vite(['resources/js/showPassword.js'])
@endsection
