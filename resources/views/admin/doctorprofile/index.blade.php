@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('partials.session-message')
        <div class="row text-center flex-column">
            @if ($doctorProfile)
                <div class="col"><img src="{{ $doctorProfile->cv }}" alt=""></div>
                <div class="col"><img src="{{ $doctorProfile->photo }}" alt=""></div>
                <div class="col">Address : {{ $doctorProfile->address }}</div>
                <div class="col">Telephone : {{ $doctorProfile->telephone }}</div>
                <div class="col">Services : {{ $doctorProfile->services }}</div>
                <div class="row py-5 justify-content-center text-center">
                    <div class="col">

                        <a class="btn btn-primary text-decoration-none" href="{{ route('profile.edit') }}">Edit your

                            profile</a>
                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal"
                            data-bs-target="#modalId">
                            Delete Profile info
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Deleting profile informations
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attention! You are deleting your profile info, this action is irreversible. Do you
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

                                            <button class="btn btn-danger" type="submit">Yes, delete it</button>
                                        </form>
                                    </div>
                                </div>
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

    </div>
@endsection
