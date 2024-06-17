@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card h-100">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column gap-2">
                <a class="btn text-warning btn-secondary fw-bold" href="{{ route('admin.doctorProfile.index') }}">YOUR
                    PROFILE</a>
                <a class="btn text-warning btn-secondary fw-bold" href="">MY MESSAGES</a>
                <a class="btn text-warning btn-secondary fw-bold" href="">MY REVIEWS</a>
                <a class="btn text-warning btn-secondary fw-bold" href="">MY STATISTICS</a>
            </div>
        </div>
    </div>
@endsection
