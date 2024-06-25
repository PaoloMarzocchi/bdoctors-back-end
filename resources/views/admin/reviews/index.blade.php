@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('partials.session-message')
        @include('partials.validation-message')
        @if ($reviews)
            <div class="container">
                <h3 class="text-center mb-4">
                    Hi dr. {{ $doctor->surname }}, here you can find all of reviews you received so
                    far!
                </h3>

                <div class="row">

                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-light border border-2 table-striped table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Received at</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reviews as $review)
                                        <tr class="">
                                            <td scope="row">
                                                {{ $review->first_name }}
                                                {{ $review->last_name }}
                                            </td>

                                            <td>
                                                {{ $review->email }}
                                            </td>

                                            <td>
                                                {{ $review->created_at }}
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#modalId-{{ $review->id }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>

                                                <!-- Modal Body -->
                                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                <div class="modal fade" id="modalId-{{ $review->id }}" tabindex="-1"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                    aria-labelledby="modalTitleId-{{ $review->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="modalTitleId-{{ $review->id }}">
                                                                    This is the review you received from:
                                                                    <strong>{{ $review->first_name }}
                                                                        {{ $review->last_name }}</strong>

                                                                </h5>

                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $review->review_text }}

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fa-solid fa-xmark"></i>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>

                                        </tr>

                                    @empty
                                    @endforelse

                                </tbody>


                            </table>


                        </div>

                    </div>
                    {{ $reviews->links() }}
                </div>
            @else
                <p>
                    Nothing to show
                </p>
        @endif
    </div>
@endsection
