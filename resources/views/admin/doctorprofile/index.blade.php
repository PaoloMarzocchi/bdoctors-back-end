@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('partials.session-message')
        <div class="row text-center flex-column">
            @if ($doctorProfile)
                <div class="col"><a href="">CV</a></div>
                <div class="col"><img src="{{ $doctorProfile->photo }}" alt=""></div>
                <div class="col">Address : {{ $doctorProfile->address }}</div>
                <div class="col">Telephone : {{ $doctorProfile->telephone }}</div>
                <div class="col">Services : {{ $doctorProfile->services }}</div>
            @else
                <p>
                    Nothing to show
                </p>
            @endif
            {{-- @forelse ($doctorProfile as $doctor)
        <a href="">CV</a>
        <img src="{{ $doctor->photo }}" alt="">
        Address : {{ $doctor->address }}
        Telephone : {{ $doctor->telephone }}
        Services : {{ $doctor->services }}
    @empty
        <p>
            Nothing to show
        </p>
    @endforelse --}}
        </div>
        <div class="row py-5 justify-content-center text-center">
            <div class="col">
                <a class="btn btn-primary text-decoration-none" href="{{ route('admin.doctorProfile.create') }}">Edit your
                    profile</a>
            </div>
        </div>
    </div>
@endsection
