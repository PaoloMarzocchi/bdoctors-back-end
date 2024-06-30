@extends('layouts.app')

@section('content')
  <div class="my_image_right_2 h-100">
    <img src="/img/account-2.png" alt="">
  </div>
  <div class="my_image_left_2 h-100">
    <img src="/img/account-1.png" alt="">
  </div>
  <div class="container py-5">
    {{-- <div class="d-flex justify-content-between my-4 align-items-center">
            <h2 class="section_title display-5 fw-bold my_primary z-3">
                {{ __('Account') }}
            </h2>
            <a class="btn my_btn_primary px-4 rounded-pill my-3 z-3" href="{{ route('admin.doctorProfile.index') }}">
                Show
                profile
            </a>
        </div> --}}


    @include('partials.validation-message')

    @if (session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card p-4 mb-4 bg-white shadow rounded-4">
      @include('profile.partials.update-profile-information-form')
    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-4">
      @include('profile.partials.update-password-form')
    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-4">
      @include('profile.partials.delete-user-form')
    </div>
    <div class="d-flex justify-content-center">
      <a class="btn my_btn_primary px-4 rounded-pill my-3 z-3" href="{{ route('admin.doctorProfile.index') }}">
        Show
        profile
        <i class="ms-2 fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </div>
@endsection
