@extends('layouts.app')
@section('content')
  <div class="container">
    <h2 class="fs-2 text-warning my-4">
      {{ __('Profile') }}
    </h2>

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
      @include('profile.partials.update-doctor-profile-form')
    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
      @include('profile.partials.update-password-form')
    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">
      @include('profile.partials.delete-user-form')
    </div>
  </div>
@endsection
