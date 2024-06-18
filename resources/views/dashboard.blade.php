@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card h-100">
                    {{-- LET'S MAKE THIS FAKE-AI TEXT AREA BIGGER --}}
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __("Welcome BDoctor ! I'm your AI, Docty.") }}
                        <br>
                        {{ __('Do you want to ask me something ?') }}
                        <div class="mb-3">
                            <textarea class="form-control" name="" id="" rows="3"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col d-flex flex-column gap-2">
                <a class="btn my_primary btn-secondary fw-bold" href="{{ route('admin.doctorProfile.index') }}">YOUR
                    PROFILE</a>
                <a class="btn my_primary btn-secondary fw-bold" href="">MY MESSAGES</a>
                <a class="btn my_primary btn-secondary fw-bold" href="">MY REVIEWS</a>
                <a class="btn my_primary btn-secondary fw-bold" href="">MY STATISTICS</a>
                {{-- LET'S MAKE THOSE SQUARES WITH IMG AS A BACKGROUND + TEXT IN THE MIDDLE ?? --}}
            </div>
        </div>
    </div>
@endsection
