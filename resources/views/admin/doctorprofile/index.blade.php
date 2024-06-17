@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('partials.session-message')
        @if ($doctorProfile)
            <div class="row">
                <div class="col">
                    <h1>Dr. {{ $doctorProfile->user->name }} {{ $doctorProfile->surname }}</h1>
                </div>

                <div class="col justify-content-end d-flex align-items-center gap-3">

                    <a class="btn btn-primary text-decoration-none" href="{{ route('profile.edit') }}">Edit your

                        profile</a>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#modalId">
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

            <div class="row py-5">
                {{-- photo --}}
                <div class="col-6">
                    @if (Str::startsWith($doctorProfile->photo, 'https://'))
                        <img class="img-fluid rounded" loading="lazy" src="{{ $doctorProfile->photo }}" alt="">
                    @else
                        <img class="img-fluid rounded" loading="lazy" src="{{ asset('storage/' . $doctorProfile->photo) }}"
                            alt="">
                    @endif
                </div>
                <div class="col-6 text-center">
                    <div class="card">
                        <div class="card-body">
                            {{-- address --}}
                            <div class="py-3">
                                <strong>Address :</strong> {{ $doctorProfile->address }}
                            </div>
                            {{-- telephone --}}
                            <div class="py-3">
                                <strong>Telephone :</strong> {{ $doctorProfile->telephone }}
                            </div>
                            {{-- specializations --}}

                            @if (count($doctorProfile->specializations) != 0)
                                <div class="py-3">
                                    <strong>Specializzazioni:</strong>
                                    @foreach ($doctorProfile->specializations as $specialization)
                                        <span class="badge bg-dark">{{ $specialization->name }}</span>
                                    @endforeach
                                </div>
                            @else
                                <div>
                                    <strong>Nessuna specializzazione inserita</strong>
                                </div>
                            @endif
                            {{-- services --}}
                            <div class="py-3">
                                <strong>Services :</strong> {{ $doctorProfile->services }}
                            </div>
                            {{-- cv --}}
                            <div class="py-3">
                                <strong>Curriculum :</strong>
                                <a href="{{ asset('storage/' . $doctorProfile->cv) }}">Apri</a>
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
