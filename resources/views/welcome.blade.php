@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container py-5">
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
                    <a class="btn text-warning btn-secondary py-3 px-3 fw-bold" href="{{ route('register') }}">Become a
                        BDoctor</a>
                </div>
            </div>

        </div>
    </div>
@endsection
