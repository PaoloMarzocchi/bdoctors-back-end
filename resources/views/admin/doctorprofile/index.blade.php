@extends('layouts.app')

@section('content')
    @if ($doctorProfile)
        <a href="">CV</a>
        <img src="{{ $doctorProfile->photo }}" alt="">
        Address : {{ $doctorProfile->address }}
        Telephone : {{ $doctorProfile->telephone }}
        Services : {{ $doctorProfile->services }}
    @else
        <p>
            Nothing to show
        </p>
    @endif
    <a class="btn btn-primary text-decoration-none" href="{{ route('admin.doctorProfile.create') }}">Edit your profile</a>
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
@endsection
