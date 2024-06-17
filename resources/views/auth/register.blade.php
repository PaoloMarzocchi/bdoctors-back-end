@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @include('partials.validation-message')

                <div class="card">
                    <div class="card-header text-warning text-center">{{ __('Register as a new BDoctor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name *') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Surname *') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address *') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required
                                        autocomplete="new-address">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="spacializations[]" class="col-md-4 col-form-label text-md-right mb-2">
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
                                @error('specializzations')
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
                                    <button type="submit" class="btn text-warning btn-secondary fw-bold">
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
    </div>
    </div>
@endsection
