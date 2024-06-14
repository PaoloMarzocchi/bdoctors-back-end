@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('partials.validation-message')
        <form action="{{ route('admin.doctorProfile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="cv" class="form-label">Curriculum Vitae</label>
                <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" id="cv"
                    aria-describedby="cvHelpId" placeholder="Your cv" value="" />
                <small id="cvHelpId" class="form-text text-muted">Choose your CV</small>
                @error('cv')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo"
                    id="photo" aria-describedby="photoHelpId" placeholder="Your Photo" value="" />
                <small id="photoHelpId" class="form-text text-muted">Choose your photo</small>
                @error('photo')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    id="address" aria-describedby="addressHelpId" placeholder="Your Address"
                    value="{{ old('address') }}" />
                <small id="addressHelpId" class="form-text text-muted">Insert your business adress</small>
                @error('address')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                    id="telephone" aria-describedby="telephoneHelpId" placeholder="Your Telephone"
                    value="{{ old('telephone') }}" />
                <small id="telephoneHelpId" class="form-text text-muted">Insert telephone number</small>
                @error('telephone')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-wrap py-3">
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($specializations as $specialization)
                        <input name="techs[]" type="checkbox" class="btn-check" id="tech-{{ $specialization->id }}"
                            autocomplete="off" value="{{ $specialization->id }}"
                            {{ in_array($specialization->id, old('techs', [])) ? 'checked' : '' }} />
                        <label class="btn btn-outline-primary"
                            for="tech-{{ $specialization->id }}">{{ $specialization->name }}</label>
                    @endforeach
                </div>
                @error('specializzations')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="services" class="form-label">Services</label>
                <textarea rows="6" type="text-area" class="form-control @error('services') is-invalid @enderror" name="services"
                    id="services" aria-describedby="servicesHelpId" placeholder="Describe what you offer to clients"
                    value="{{ old('services') }}"></textarea>
                <small id="servicesHelpId" class="form-text text-muted">Write your services</small>
                @error('services')
                    <div class="text-danger py-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-dark text-success">
                    <i class="fa-solid fa-plus fa-lg fa-fw"></i>
                    <span class="fw-bold px-1">
                        CREATE
                    </span>
                </button>
                <div class="px-3">
                    <a class="btn btn-dark text-danger" href="{{ route('admin.doctorProfile.index') }}">
                        <i class="fa-solid fa-rotate-left"></i>
                        <span class="px-2 fw-bold">
                            CANCEL AND BACK TO PROFILE
                        </span>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
