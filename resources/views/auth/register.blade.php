@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.validation-message')

                <div class="card">
                    <div class="card-header my_primary text-center">{{ __('Register as a new BDoctor') }}</div>

                    <div class="card-body">
                        <form class="row g-3" id="registrationForm" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="col-md-6">
                                <label for="name" class="col-form-label">
                                    {{ __('Name *') }}
                                </label>
                                <div class="inputWrapper">
                                    <input id="name" type="text"
                                        class="pe-5 form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" placeholder="es.: Mario" autocomplete="name" autofocus>
                                    <i class="fa-solid fa-circle-check d-none"></i>
                                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                                    <small class="errorMessage text-danger"></small>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="surname" class="col-form-label">
                                    {{ __('Surname *') }}
                                </label>

                                <div class="inputWrapper">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" placeholder="es.: Rossi" autocomplete="surname"
                                        autofocus>
                                    <i class="fa-solid fa-circle-check d-none"></i>
                                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                                    <small class="errorMessage text-danger"></small>
                                </div>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="col-form-label">
                                    {{ __('Address *') }}
                                </label>

                                <div class="inputWrapper">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" placeholder="es.: Via Roma 4"
                                        autocomplete="new-address">
                                    <i class="fa-solid fa-circle-check d-none"></i>
                                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                                    <small class="errorMessage text-danger"></small>
                                </div>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="col-form-label">
                                    {{ __('E-Mail Address *') }}
                                </label>

                                <div class="inputWrapper">
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="es.: mariorossi@example.it"
                                        autocomplete="email">
                                    <i class="fa-solid fa-circle-check d-none"></i>
                                    <i class="fa-solid fa-circle-exclamation d-none"></i>
                                    <small class="errorMessage text-danger"></small>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-md-6">
                                <label for="password" class="col-form-label">
                                    {{ __('Password *') }}
                                </label>

                                <div class="inputWrapper">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="password">

                                    <i class="passwordCheck fa-solid fa-circle-check d-none"></i>
                                    <i class="passwordError fa-solid fa-circle-exclamation d-none"></i>
                                    </input>
                                    <button type="button" class="showPassword">
                                        <i class="fa-solid fa-eye"></i>
                                        <i class="fa-solid fa-eye-slash d-none"></i>
                                    </button>
                                    <small class="errorMessage text-danger"></small>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="col-form-label">
                                    {{ __('Confirm Password *') }}
                                </label>

                                <div class="inputWrapper">
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="password_confirmation">
                                    <button type="button" class="showConfirmedPassword">
                                        <i class="fa-solid fa-eye"></i>
                                        <i class="fa-solid fa-eye-slash d-none"></i>
                                    </button>
                                    <i class="passwordCheck fa-solid fa-circle-check d-none"></i>
                                    <i class="passwordError fa-solid fa-circle-exclamation d-none"></i>
                                    <small class="errorMessage text-danger"></small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="passwordRules" class="p-2 rounded d-none">
                                    <span> Password must contain at least: </span>
                                    <ul class="list-unstyled">
                                        <li id="weak">
                                            <i class="weakIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                                            8 characters
                                        </li>
                                        <li id="medium">
                                            <i class="mediumIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                                            One lowercase letter (a-z)
                                        </li>
                                        <li id="strong">
                                            <i class="strongIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                                            One uppercase letter (A-Z)
                                        </li>
                                        <li id="stronger">
                                            <i class="strongerIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                                            One number (0-9)
                                        </li>
                                        <li id="strongest">
                                            <i class="strongestIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                                            One symbol ('@', '$', '!', '%', '*', '?', '&')
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="specializations[]" class="col-form-label mb-2">
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
                                <small class="errorMessage "></small>
                                @error('specializations')
                                    <div class="errorMessage  py-2">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-mn-12 mt-3 row text-danger">
                                <p>
                                    ( <span class="text-dark">*</span> ) Required fields.
                                </p>
                            </div>


                            <div class="col-12">
                                <button id="submitButton" type="submit"
                                    class="btn my_primary btn-secondary fw-bold shadow">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>


                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="surname" class="col-form-label">
                  {{ __('Surname *') }}
                </label>

                <div class="inputWrapper">
                  <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                    name="surname" value="{{ old('surname') }}" placeholder="es.: Rossi" autocomplete="surname" autofocus>
                  <i class="fa-solid fa-circle-check d-none"></i>
                  <i class="fa-solid fa-circle-exclamation d-none"></i>
                  <small class="errorMessage text-danger"></small>
                </div>

                @error('surname')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="address" class="col-form-label">
                  {{ __('Address *') }}
                </label>

                <div class="inputWrapper">
                  <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') }}" placeholder="es.: Via Roma 4" autocomplete="new-address">
                  <i class="fa-solid fa-circle-check d-none"></i>
                  <i class="fa-solid fa-circle-exclamation d-none"></i>
                  <small class="errorMessage text-danger"></small>
                </div>

                @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="email" class="col-form-label">
                  {{ __('E-Mail Address *') }}
                </label>

                <div class="inputWrapper">
                  <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" placeholder="es.: mariorossi@example.it"
                    autocomplete="email">
                  <i class="fa-solid fa-circle-check d-none"></i>
                  <i class="fa-solid fa-circle-exclamation d-none"></i>
                  <small class="errorMessage text-danger"></small>
                </div>

                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>




              <div class="col-md-6">
                <label for="password" class="col-form-label">
                  {{ __('Password *') }}
                </label>

                <div class="inputWrapper">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="password">

                  <i class="passwordCheck fa-solid fa-circle-check d-none"></i>
                  <i class="passwordError fa-solid fa-circle-exclamation d-none"></i>
                  </input>
                  <button type="button" class="showPassword">
                    <i class="fa-solid fa-eye"></i>
                    <i class="fa-solid fa-eye-slash d-none"></i>
                  </button>
                  <small class="errorMessage text-danger"></small>
                </div>

                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="col-md-6">
                <label for="password_confirmation" class="col-form-label">
                  {{ __('Confirm Password *') }}
                </label>

                <div class="inputWrapper">
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                    autocomplete="password_confirmation">
                  <button type="button" class="showConfirmedPassword">
                    <i class="fa-solid fa-eye"></i>
                    <i class="fa-solid fa-eye-slash d-none"></i>
                  </button>
                  <i class="passwordCheck fa-solid fa-circle-check d-none"></i>
                  <i class="passwordError fa-solid fa-circle-exclamation d-none"></i>
                  <small class="errorMessage text-danger"></small>
                </div>
              </div>

              <div class="col-md-12">
                <div id="passwordRules" class="p-2 rounded d-none">
                  <span> Password must contain at least: </span>
                  <ul class="list-unstyled">
                    <li id="weak">
                      <i class="weakIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                      8 characters
                    </li>
                    <li id="medium">
                      <i class="mediumIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                      One lowercase letter (a-z)
                    </li>
                    <li id="strong">
                      <i class="strongIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                      One uppercase letter (A-Z)
                    </li>
                    <li id="stronger">
                      <i class="strongerIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                      One number (0-9)
                    </li>
                    <li id="strongest">
                      <i class="strongestIcon ms-3 me-1 fa-solid fa-triangle-exclamation"></i>
                      One symbol ('@', '$', '!', '%', '*', '?', '&')
                    </li>
                  </ul>
                </div>
              </div>

              <div class="col-md-12">
                <label for="specializations[]" class="col-form-label mb-2">
                  {{ __('Choose your specializations *') }}
                </label>


                <div class="specialization_wrapper d-flex rounded flex-wrap gap-2"
                  @error('technologies') is-invalid @enderror">

                  @foreach ($specializations as $specialization)
                    <input name="specializations[]" type="checkbox" class="btn-check"
                      id="specialization-{{ $specialization->id }}" autocomplete="off"
                      value="{{ $specialization->id }}"
                      {{ in_array($specialization->id, old('specializations', [])) ? 'checked' : '' }} />

                    <label class="specialization_label" for="specialization-{{ $specialization->id }}">
                      <i class=" me-2 fa-solid text-warning {{ $specialization->icon }}"></i>
                      <span>{{ $specialization->name }}</span>
                    </label>
                  @endforeach
                </div>
                <small class="specialization_error_message text-danger "></small>


                @error('specializations')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror


              </div>


              <div class="col-mn-12 mt-5 row text-danger">
                <p>
                  ( <span class="text-dark">*</span> ) Required fields.
                </p>
              </div>


              <div class="col-12">
                <button id="submitButton" type="submit" class="btn my_primary btn-secondary fw-bold">
                  {{ __('Register') }}
                </button>
              </div>

            </form>
          </div>

        </div>
    </div>
    @vite(['resources/js/validation.js'])
@endsection
