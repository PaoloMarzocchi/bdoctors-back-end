@extends('layouts.admin')

@section('content')

    <div class="container my-3">
        {{-- Bottone per sidebar --}}
        <button class="btn rounded border mb-3 d-lg-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        {{-- :::: MESSAGES :::: --}}
        <div class="messages mb-4 border">
            <div class="container-fluid overlay p-0">
                <section class="p-3 p-md-4 p-lg-5">
                    <h3 class="section_title display-6 fw-bold my_primary mb-3">Last messages</h3>

                    <div class="message_list d-flex flex-column gap-3 mb-3">
                        @forelse ($messages as $message)
                            <div class="message shadow p-2 p-md-3">
                                <div class="name">{{ $message->sender_first_name . ' ' . $message->sender_last_name }}
                                </div>
                                <div class="email">{{ $message->email }}</div>
                                <div class="message_text">{{ $message->message_text }}</div>
                                <div class="date">{{ $message->formattedDate($message->created_at) }}</div>
                            </div>
                        @empty
                            <h4>You don't have any message for now</h4>
                        @endforelse
                    </div>

                    <a class="btn my_btn_primary btn-lg px-3 px-md-4 rounded-pill mt-3 mt-md-4"
                        href="{{ route('admin.messages.index') }}">
                        View all messages
                        <i class="ms-2 fa-solid fa-arrow-right"></i>
                    </a>
                </section>
            </div>
        </div>

        <div class="row align-items-md-stretch g-4">

            {{-- :::: REVIEWS :::: --}}
            <div class="col-md-6">
                <div class="reviews h-100 border">
                    <section class="overlay p-3 p-md-4 p-lg-5">
                        <h3 class="section_title display-6 fw-bold my_primary mb-3">Last reviews</h3>

                        <div class="review_list d-flex flex-column gap-3 mb-3">
                            @forelse ($reviews as $review)
                                <div class="review shadow p-2 p-md-3">
                                    <div class="name">{{ $review->first_name . ' ' . $review->last_name }}</div>
                                    <div class="email">{{ $review->email }}</div>
                                    <div class="review_text">{{ $review->review_text }}</div>
                                    <div class="date">{{ $review->formattedDate($review->created_at) }}</div>
                                </div>
                            @empty
                                <h4>You don't have any review for now</h4>
                            @endforelse
                        </div>

                        <a class="btn my_btn_primary px-3 px-md-4 rounded-pill mt-3 mt-md-4"
                            href="{{ route('admin.reviews.index') }}">
                            View all reviews
                            <i class="ms-2 fa-solid fa-arrow-right"></i>
                        </a>
                    </section>
                </div>
            </div>

            {{-- :::: VOTES :::: --}}
            <div class="col-md-6">
                <div class="votes border h-100">
                    <section class="overlay p-3 p-md-4 p-lg-5 d-flex flex-column align-items-start">
                        <h3 class="section_title display-6 fw-bold my_primary mb-3">Average vote</h3>

                        <div class="review_list d-flex flex-column flex-fill gap-2 mb-3">
                            @if ($votes)
                                <div>
                                    <h4>
                                        Hi Dr. <span
                                            class="my_primary text-decoration-underline">{{ $doctorProfile->surname }}</span>,
                                        you received
                                        <span class="my_primary text-decoration-underline">{{ $numberVotes }}</span>
                                        votes.
                                    </h4>
                                    <h5 class="my-4">Average vote: <span
                                            class="ms-3 mb-2 text-warning stars_wrapper rounded-3 p-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $average)
                                                    <i class="fa-solid fa-star fa-lg" style="color: #FFD43B;"></i>
                                                @else
                                                    <i class="fa-regular fa-star fa-lg" style="color: #FFD43B;"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </h5>

                                </div>
                                {{-- <span class="text-warning ms-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $average)
                                            <i class="fa-solid fa-star fa-lg" style="color: #FFD43B;"></i>
                                        @else
                                            <i class="fa-regular fa-star fa-lg" style="color: #FFD43B;"></i>
                                        @endif
                                    @endfor
                                </span> --}}
                            @else
                                <h4>You don't have any vote for now</h4>
                            @endif
                        </div>

                        <a class="btn my_btn_primary px-3 px-md-4 rounded-pill mt-3 mt-md-4"
                            href="{{ route('admin.reviews.index') }}">
                            View all votes
                            <i class="ms-2 fa-solid fa-arrow-right"></i>
                        </a>
                    </section>
                </div>
            </div>



        </div>

        {{-- :::: SPONSORSHIPS :::: --}}
        <div class="sponsorships border mt-4">
            <div class="container-fluid overlay p-0">
                <section class="p-3 p-md-4 p-lg-5">
                    <h3 class="section_title display-6 fw-bold my_primary mb-3">Active sponsorships</h3>

                    <div class="sponsorship_list d-flex flex-column gap-2">

                        @if ($doctorProfile->sponsorships)
                            <div class="bg_dark_transparent shadow px-3 px-md-4 py-3 rounded-4">

                                <div id="countdown"
                                    class="d-flex flex-column flex-xxl-row justify-content-between align-items-start align-items-xxl-center gap-3">

                                    <div>
                                        <span>Your sponsorization time will expire in:</span>
                                        <br>
                                        <span id="remainingTime"
                                            class="fw-bold my_primary fs-5">{{ $remainingTime }}</span>
                                    </div>
                                    <a class="btn my_btn_secondary px-3 px-md-4 rounded-pill"
                                        href="{{ route('admin.') }}">Payment
                                        history</a>

                                </div>
                            </div>
                        @else
                            <span class="fw-bold">
                                You don't have any active sponsorship.
                            </span>
                        @endif

                    </div>

                    <a class="btn my_btn_primary px-3 px-md-4 rounded-pill mt-3 mt-md-4"
                        href="{{ route('admin.sponsorship.index') }}">
                        Buy other sponsorships
                        <i class="ms-2 fa-solid fa-arrow-right"></i>
                    </a>

                </section>
            </div>
        </div>


    </div>
    </div>

    @vite(['resources/js/sponsorshipCountDown.js'])
@endsection
