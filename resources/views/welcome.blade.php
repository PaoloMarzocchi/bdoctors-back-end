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
                Welcome page not-registered user
            </h1>
            <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg"
                type="button">Documentation</a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p></p>
        </div>
    </div>
@endsection
