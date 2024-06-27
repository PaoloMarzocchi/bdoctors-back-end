@extends('layouts.app')
@section('content')
    <div class="text-center bg-body-tertiary rounded-3">

        <div class="logo_laravel d-flex justify-content-center my_logo py-5">
            <img width="500px" src="./img/BDoctors_transparent.png" alt="">
        </div>
        @if (Auth::user())
            <h1 class="text-body-emphasis py-4">
                You are already logged in !
            </h1>
            <a class="btn my_btn_primary btn-lg px-4 rounded-pill me-3 my-3" href="{{ route('dashboard') }}">
                Dashboard
                <i class="ms-2 fa-solid fa-arrow-right"></i>
            </a>
        @else
            <h1 class="text-body-emphasis">Welcome to BDoctors, new User !</h1>
            <p class="col-lg-8 mx-auto fs-5 text-muted">
                Welcome to your personal area. Manage your account, update your information, and access exclusive resources
                for
                registered doctors. Enhance your professional experience with just a few clicks
            </p>
            <div class="d-inline-flex gap-2 mb-5">
                <a class="btn my_btn_primary btn-lg px-4 rounded-pill me-3" href="{{ route('register') }}">
                    Become a BDoctor
                    <i class="ms-2 fa-solid fa-arrow-right"></i>
                </a>
                <a class="btn my_btn_secondary btn-lg px-4 rounded-pill" href="{{ route('login') }}">
                    Login
                </a>
            </div>
        @endif
        {{-- <div class="d-inline-flex gap-2 mb-5">
            <a class="btn my_btn_primary btn-lg px-4 rounded-pill me-3" href="{{ route('register') }}">
                Become a BDoctor
                <i class="ms-2 fa-solid fa-arrow-right"></i>
            </a>
            <a class="btn my_btn_secondary btn-lg px-4 rounded-pill" href="{{ route('login') }}">
                Login
            </a>
        </div> --}}
    </div>

    {{--   <div class="jumbotron-fluid pb-5 bg-light text-center">
    <div class="logo_laravel d-flex justify-content-center py-5 my_logo">
      <img width="600px" src="./img/logo.png" alt="">
      <style>
        .my_logo {
          img {
            border-radius: 50%;
          }
        }
      </style>
    </div>
    <h1 class="display-5 fw-bold mb-5">
      Welcome to BDoctors, new User !
    </h1>
    <div class="d-flex flex-column justify-content-center align-items-center">
      <div class="col-2">
        <a class="btn my_primary btn-dark py-3 px-3 fw-bold shadow" href="{{ route('register') }}">Become a
          BDoctor</a>
      </div>
    </div>
  </div> --}}
@endsection
