@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">

        @include('partials.validation-message')

        <div class="card">
          <div class="card-header my_primary text-center">{{ __('Register as a new BDoctor') }}</div>

          <div class="card-body">
            <form id="registrationForm" method="POST" action="{{ route('register') }}">
              @csrf

              <div class="mb-4 row">
                <label for="name" class="col-md-4 col-form-label text-md-right">
                  {{ __('Name *') }}
                </label>

                <div class="col-md-6">
                  <div class="inputWrapper">
                    <input id="name" type="text" class="pe-5 form-control @error('name') is-invalid @enderror"
                      name="name" value="{{ old('name') }}" placeholder="es.: Mario" autocomplete="name" autofocus>
                    <i class="fa-solid fa-circle-check d-none"></i>
                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                    <small class="text-danger"></small>
                  </div>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="surname" class="col-md-4 col-form-label text-md-right">
                  {{ __('Surname *') }}
                </label>

                <div class="col-md-6">

                  <div class="inputWrapper">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                      name="surname" value="{{ old('surname') }}" placeholder="es.: Rossi" autocomplete="surname"
                      autofocus>
                    <i class="fa-solid fa-circle-check d-none"></i>
                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                    <small class="text-danger"></small>
                  </div>

                  @error('surname')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="address" class="col-md-4 col-form-label text-md-right">
                  {{ __('Address *') }}
                </label>

                <div class="col-md-6">
                  <div class="inputWrapper">
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                      name="address" value="{{ old('address') }}" placeholder="es.: Via Roma 4"
                      autocomplete="new-address">
                    <i class="fa-solid fa-circle-check d-none"></i>
                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                    <small class="text-danger"></small>
                  </div>

                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="email" class="col-md-4 col-form-label text-md-right">
                  {{ __('E-Mail Address *') }}
                </label>

                <div class="col-md-6">
                  <div class="inputWrapper">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" placeholder="es.: mariorossi@example.it"
                      autocomplete="email">
                    <i class="fa-solid fa-circle-check d-none"></i>
                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                    <small class="text-danger"></small>
                  </div>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="password" class="col-md-4 col-form-label text-md-right">
                  {{ __('Password *') }}
                </label>

                <div class="col-md-6">
                  <div class="inputWrapper">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" autocomplete="password">
                    <i class="fa-solid fa-circle-check d-none"></i>
                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                    <small class="text-danger"></small>
                  </div>

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror

                  <div id="passwordRules"
                    class="d-none mt-2 p-2 border rounded border-secondary-subtle bg-secondary bg-opacity-10">
                    <span> Password must contain at least: </span>
                    <ul>
                      <li>8 characters</li>
                      <li>One lowercase and one uppercase letter (A-z)</li>
                      <li>One number (0-9)</li>
                      <li>One symbol ('@', '$', '!', '%', '*', '?', '&')</li>
                    </ul>
                  </div>

                </div>
              </div>

              <div class="mb-4 row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">
                  {{ __('Confirm Password *') }}
                </label>

                <div class="col-md-6">
                  <div class="inputWrapper">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                      autocomplete="password_confirmation">
                    <i class="fa-solid fa-circle-check d-none"></i>
                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                    <small class="text-danger"></small>
                  </div>
                </div>
              </div>

              <div class="mb-4 row">
                <label for="specializations[]" class="col-md-4 col-form-label text-md-right mb-2">
                  {{ __('Choose your specializations *') }}
                </label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                  @foreach ($specializations as $specialization)
                    <input name="specializations[]" type="checkbox" class="btn-check"
                      id="specialization-{{ $specialization->id }}" autocomplete="off"
                      value="{{ $specialization->id }}"
                      {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }} />

                    <label class="btn btn-outline-warning text-dark my_overflow"
                      for="specialization-{{ $specialization->id }}">{{ $specialization->name }}</label>
                  @endforeach
                </div>
                <small class="text-danger"></small>
                @error('specializations')
                  <div class="text-danger py-2">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-4 row text-danger">
                <p>
                  ( <span class="text-dark">*</span> ) Required fields.
                </p>
              </div>

              <div class="row text-center">
                <div class="col-12">
                  <button id="submitButton" type="submit" class="btn my_primary btn-secondary fw-bold">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
