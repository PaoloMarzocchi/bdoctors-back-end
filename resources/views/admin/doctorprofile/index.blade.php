@extends('layouts.admin')

@section('content')
    <div class="container my-4">
        {{-- Bottone per sidebar --}}
        <button class="btn rounded border mb-3 d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        @include('partials.session-message')
        @include('partials.validation-message')

        @if ($doctorProfile)

            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center mb-4">
                <div class="doctor_header">
                    <h1 class="display-5 fw-bold my_primary mb-3 mb-3">
                        Dr. {{ $doctorProfile->user->name }} {{ $doctorProfile->surname }}
                    </h1>
                    <div class="doctor_actions flex-sm-row">
                        <a class="btn my_btn_primary px-4 rounded-pill me-2 text-decoration-none shadow responsive-btn"
                            href="{{ route('admin.doctorProfile.edit', $doctorProfile) }}">
                            <strong>Edit your profile</strong>
                            <i class="ms-2 fa-solid fa-arrow-right"></i>
                        </a>
                        <a class="btn btn-outline-dark my_primary px-4 rounded-pill text-decoration-none shadow responsive-btn"
                            target="_blank" rel="noopener noreferrer"
                            href="http://localhost:5174/doctor-profile/{{ $doctorProfile->slug }}?source=back-end">
                            <strong>View public profile</strong>
                            <i class="ms-2 fa-solid fa-up-right-from-square"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                {{-- photo --}}
                <div class="col-12 col-xl-6">
                    <div class="card h-100 shadow rounded-4 p-2">
                        @if ($doctorProfile->photo)
                            <img class="img-fluid rounded-3" style="object-fit: cover;" loading="lazy"
                                src="{{ asset('storage/' . $doctorProfile->photo) }}" alt="">
                        @else
                            <img class="img-fluid rounded-3" style="object-fit: cover;" loading="lazy"
                                src="/img/no-image.jpg" alt="">
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card h-100 shadow rounded-4">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <div class="card-img-top my_background h-100 image-fluid mb-3">
                                {{-- <img src="/img/doctor-profile.png" alt=""> --}}
                            </div>
                            {{-- address --}}
                            <div class="pb-2">
                                <strong>Address:</strong> {{ $doctorProfile->address }}
                            </div>
                            {{-- telephone --}}
                            <div class="pb-2">
                                <strong>Telephone: </strong>
                                @if ($doctorProfile->telephone)
                                    (+39) {{ $doctorProfile->telephone }}
                                @else
                                    <span>N/A</span>
                                @endif
                            </div>
                            {{-- specializations --}}
                            @if (count($doctorProfile->specializations) != 0)
                                <div class="pb-2">
                                    <strong>Specializations:</strong> <br>
                                    @foreach ($doctorProfile->specializations as $specialization)
                                        <span class="badge bg_primary text-white shadow">{{ $specialization->name }}</span>
                                    @endforeach
                                </div>
                            @else
                                <div>
                                    <strong>No specializations to show</strong>
                                </div>
                            @endif
                            {{-- services --}}
                            <div class="pb-2">
                                <strong>Services:</strong> <br>
                                @if ($doctorProfile->services)
                                    <span>{{ $doctorProfile->services }}</span>
                                @else
                                    <form action="{{ route('admin.doctorProfile.update', $doctorProfile) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="input-group">
                                            <textarea class="form-control rounded-end-0 @error('services') is-invalid @enderror" name="services" id="services"
                                                aria-describedby="servicesHelpId" placeholder="Your Services" rows="4">{{ old('services', $doctorProfile->services) }}</textarea>
                                            <button type="submit" class="btn rounded-start-0 btn-secondary my_primary">
                                                Submit
                                            </button>
                                        </div>
                                        @error('services')
                                            <div class="text-danger py-2">{{ $message }}</div>
                                        @enderror
                                    </form>
                                @endif
                            </div>
                            {{-- cv --}}
                            <div class="pb-2">
                                <strong>Curriculum:</strong>
                                @if ($doctorProfile->cv)
                                    <a target="_blank" rel="noopener noreferrer"
                                        href="{{ asset('storage/' . $doctorProfile->cv) }}">
                                        Open
                                    </a>
                                @else
                                    <form action="{{ route('admin.doctorProfile.update', $doctorProfile) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="input-group">
                                            <input type="file" accept=".pdf"
                                                class="form-control @error('cv') is-invalid @enderror" name="cv"
                                                id="cv" aria-describedby="cvHelpId" placeholder="Your CV"
                                                value="{{ old('cv', $doctorProfile->cv) }}" />
                                            <button type="submit" class="btn my_btn_primary">
                                                Submit
                                            </button>
                                        </div>
                                        @error('cv')
                                            <div class="text-danger py-2">{{ $message }}</div>
                                        @enderror
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>Nothing to show</p>
        @endif
    </div>
@endsection
