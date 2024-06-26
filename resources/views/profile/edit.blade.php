@extends('layouts.app')

@section('content')
  <div class="my_image_right_2 h-100">
    <img src="/img/account-2.png" alt="">
  </div>
  <div class="my_image_left_2 h-100">
    <img src="/img/account-1.png" alt="">
  </div>
  <div class="my_container">
    <div class="d-flex justify-content-between my-4 align-items-center">
      <h2 class="fs-2 my_primary z-3 bg-secondary rounded px-2 py-1 text-center shadow">
        {{ __('Account') }}
      </h2>
      <a class="btn btn-secondary my_primary shadow" href="{{ route('admin.doctorProfile.index') }}">Show profile</a>
    </div>


    @include('partials.validation-message')

    @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
      @include('profile.partials.update-profile-information-form')
    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
      @include('profile.partials.update-password-form')
    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
      @include('profile.partials.delete-user-form')
    </div>
  </div>
@endsection
