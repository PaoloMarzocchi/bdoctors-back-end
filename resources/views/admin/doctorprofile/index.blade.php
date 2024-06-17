@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('partials.session-message')
        @include('partials.validation-message')
        @if ($doctorProfile)
            <div class="row">
                <div class="col">
                    <h1>Dr. {{ $doctorProfile->user->name }} {{ $doctorProfile->surname }}</h1>
                </div>

                <div class="col justify-content-end d-flex align-items-center gap-3">

                    <a class="btn btn-secondary my_primary text-decoration-none" href="{{ route('profile.edit') }}">
                        Edit your profile
                    </a>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger btn-md text-dark" data-bs-toggle="modal"
                        data-bs-target="#modalId">
                        Delete Profile info
                    </button>
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Deleting profile informations
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Attention! You are deleting your profile info, this action is
                                    irreversible. Do you
                                    want to
                                    continue?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        No, go back
                                    </button>
                                    <form action="{{ route('admin.doctorProfile.destroy', $doctorProfile) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger" type="submit">Yes, delete
                                            it</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-5 vh-100">
                {{-- photo --}}
                <div class="col-6">
                    @if ($doctorProfile->photo)
                        <img width="600" style="object-fit: fill" class="img-fluid rounded h-100 border shadow"
                            loading="lazy" src="{{ asset('storage/' . $doctorProfile->photo) }}" alt="">
                    @else
                        <img width="600" style="object-fit: fill" class="img-fluid rounded h-100 border shadow"
                            loading="lazy" src="/img/no-image.jpg" alt="">
                    @endif
                </div>
                <div class="col-6 text-center">
                    <div class="card h-100 shadow">
                        <div class="card-body d-flex flex-column justify-content-evenly">
                            {{-- address --}}
                            <div class="py-3">
                                <strong>Address :</strong> {{ $doctorProfile->address }}
                            </div>
                            {{-- telephone --}}
                            <div class="py-3">
                                <strong>Telephone : </strong>
                                @if ($doctorProfile->telephone)
                                    (+39) {{ $doctorProfile->telephone }}
                                @else
                                    <span>N/A</span>
                                @endif
                            </div>
                            {{-- specializations --}}

                            @if (count($doctorProfile->specializations) != 0)
                                <div class="py-3">
                                    <span class="mb-4"><strong>Specializations:</strong></span> <br>
                                    @foreach ($doctorProfile->specializations as $specialization)
                                        <span class="badge bg-dark my_primary mt-4">{{ $specialization->name }}</span>
                                    @endforeach
                                </div>
                            @else
                                <div>
                                    <strong>No specializations to show</strong>
                                </div>
                            @endif
                            {{-- services --}}
                            <div class="py-3">
                                <span class="mb-4"><strong>Services :</strong></span> <br>
                                @if ($doctorProfile->services)
                                    <span class="mb-4">{{ $doctorProfile->services }}</span>
                                @else
                                    <form class="mt-4" action="{{ route('admin.doctorProfile.update', $doctorProfile) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="input-group mb-3">
                                            <input type="text"
                                                class="form-control @error('services') is-invalid @enderror" name="services"
                                                id="services" aria-describedby="servicesHelpId" placeholder="Your Services"
                                                value="{{ old('services', $doctorProfile->services) }}" />

                                            <button type="submit" class="btn btn-secondary my_primary">
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
                            <div class="py-3">
                                <strong>Curriculum :</strong>
                                @if ($doctorProfile->cv)
                                    <a target="_blank" rel="noopener noreferrer"
                                        href="{{ asset('storage/' . $doctorProfile->cv) }}">
                                        Apri
                                    </a>
                                @else
                                    <form class="mt-4" action="{{ route('admin.doctorProfile.update', $doctorProfile) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control @error('cv') is-invalid @enderror"
                                                name="cv" id="cv" aria-describedby="cvHelpId"
                                                placeholder="Your CV" value="{{ old('cv', $doctorProfile->cv) }}" />
                                            <button type="submit" class="btn btn-secondary my_primary">
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
            @else
                <p>
                    Nothing to show
                </p>
        @endif
    </div>


@endsection
