@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        {{-- Bottone per sidebar --}}
        <button class="btn rounded border mb-3 d-block d-sm-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="image_right positon-relative z-n1">
            <img src="/img/sponsorship_green.png" alt="">
        </div>
        <div class="image_left positon-relative z-n1">
            <img src="/img/informations-right.png" alt="">
        </div>


        <div class="wrapper w-100 p-4 mb-4 shadow rounded-lg">

            <h3 class="display-5 fw-bold my_primary pb-3">Your sponsorship</h3>

            <div class="sponsorship_list d-flex flex-column gap-2">

                @if ($doctorProfile->sponsorships)
                    <div class="bg_dark_transparent shadow px-4 py-3 rounded-4">

                        <div id="countdown" class="d-flex justify-content-between align-items-center">

                            <div>
                                <span class="fw-bold">Your sponsorization time will expire in:</span>
                                <br>
                                <span id="remainingTime" class="fw-bold my_primary fs-5">{{ $remainingTime }}</span>
                                <br>
                                Expiration date :<span class="text-decoration-underline">
                                    {{ $formattedExpirationDate }}
                                </span>
                            </div>
                            <a class="btn my_btn_primary px-4 rounded-pill" href="{{ route('admin.') }}">Payment history</a>

                        </div>
                    </div>
                @else
                    <span class="fw-bold">
                        You don't have any active sponsorship.
                    </span>
                @endif

                {{-- @forelse ($doctorProfile->sponsorships as $sponsorship)
                    <div class="bg_dark_transparent shadow px-2 py-3 rounded-4">
                        <div class="fw-bold mb-2 my_primary">
                            {{ $sponsorship->name }}:
                        </div>
                        <div id="countdown">Your {{ strtolower($sponsorship->name) }} will expire in:

                            <span id="hours">{{ $sponsorship->timeRemaining($sponsorship->created_at)['hours'] }}</span>
                            <span
                                id="minutes">{{ $sponsorship->timeRemaining($sponsorship->created_at)['minutes'] }}:</span>
                            <span
                                id="seconds">{{ $sponsorship->timeRemaining($sponsorship->created_at)['seconds'] }}</span>

                        </div>
                    </div>
                @empty
                    <h4>You don't have any message for now.</h4>
                @endforelse --}}

            </div>

        </div>

        <div class="wrapper bg_dark_transparent w-100 p-4 mb-4 shadow rounded-lg">
            <h3 class="display-5 fw-bold my_primary">Purchase a new sponsorship</h3>
            <div class="pricing-header pb-md-4">
                <p class="fs-5">
                    Highlight your profile! Purchase sponsorships to boost your visibility and reach more users. Take your
                    presence
                    to the next level with our promotion options
                </p>
            </div>

            @include('partials.session-message')
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach ($sponsorships as $sponsorship)
                    <div class="col">
                        <div class="card mb-4 rounded-4 shadow-sm border-0">
                            <div>
                                <div class="card-header bg_secondary py-3 rounded-top-4">
                                    <input type="hidden" style="background-color: inherit; width:100px" class="border-0"
                                        name="name-{{ $sponsorship->id }}" id="name-{{ $sponsorship->id }}" placeholder=""
                                        value="{{ $sponsorship->name }} " />
                                    <h4 class="my-0 fw-bold">{{ $sponsorship->name }}</h4>
                                </div>

                                <div class="card-body d-flex flex-column gap-2">
                                    <h1 class="card-title pricing-card-title my_primary">
                                        <input type="hidden" style="background-color: inherit; width:100px"
                                            class="border-0" name="price-{{ $sponsorship->id }}"
                                            id="price-{{ $sponsorship->id }}" placeholder=""
                                            value="{{ $sponsorship->price }}" />
                                        {{ $sponsorship->price }} €
                                    </h1>

                                    <input type="hidden" style="background-color: inherit; width:100px" class="border-0"
                                        name="period-{{ $sponsorship->id }}" id="period-{{ $sponsorship->id }}"
                                        placeholder="" value="{{ $sponsorship->period }} ">
                                    <span>Highligt your profile for</span>
                                    <strong class="fs-2 my_primary">{{ $sponsorship->period }}</strong>
                                    <span>hours!</span>
                                    </input>

                                    <a href="{{ route('admin.token', $sponsorship) }}"
                                        class="btn my_btn_primary px-4 rounded-pill mx-auto">
                                        Get this
                                        Sponsorship
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    @vite(['resources/js/sponsorshipCountDown.js'])
    {{-- <script src="resources/js/sponsorshipCountDown.js"></script> --}}
@endsection
