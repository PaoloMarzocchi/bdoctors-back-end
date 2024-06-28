@extends('layouts.admin')

@section('content')
    <div class="container my-3">

        {{-- Bottone per sidebar --}}
        <button class="btn rounded border mb-3 d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="image_right positon-relative z-n1">
            <img src="/img/reviews_green.png" alt="">
        </div>
        <div class="image_left positon-relative z-n1">
            <img src="/img/informations-right.png" alt="">
        </div>

        <div class="wrapper bg_dark_transparent w-100 p-4 mb-4 shadow rounded-lg">

            <h3 class="display-5 fw-bold my_primary">Your reviews</h3>
            <h4 class="mb-4">Hi Dr. <span class="my_primary text-decoration-underline">{{ $doctor->surname }}</span>, here
                you can find all of reviews you received so far !
            </h4>

            @if ($reviews)
                <div class="table-responsive">

                    <table class="table table-light border border-2 table-striped table-bordered table-hover text-center">

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
                                        <button type="button" class="btn my_action_primary rounded-2"
                                            data-bs-toggle="modal" data-bs-target="#modalId-{{ $review->id }}"
                                            title="Open review">
                                            View
                                            <i class="fa-solid fa-eye me-1"></i>
                                        </button>

                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalId-{{ $review->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId-{{ $review->id }}" aria-hidden="true">

                                            <div class="modal-dialog modal-md" role="dialog">

                                                <div class="modal-content">
                                                    <div class="modal-header justify-content-center align-items-center">
                                                        <h5 class="modal-title text-center" id="modalTitleId">
                                                            This is the review you received from:
                                                            <br>
                                                            <strong>{{ $review->first_name }}
                                                                {{ $review->last_name }}</strong>
                                                        </h5>

                                                    </div>

                                                    <div class="modal-body">
                                                        {{ $review->review_text }}
                                                    </div>

                                                    <div class="modal-footer mx-auto">
                                                        <button type="button"
                                                            class="btn btn-secondary py-1 px-3 rounded-pill my-3"
                                                            data-bs-dismiss="modal">
                                                            <i class="fa-solid fa-xmark me-2"></i>
                                                            Close
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
                {{ $reviews->links() }}
            @else
                <h4>You don't have any review yet.</h4>
            @endif
        </div>


    </div>


    </div>
@endsection
