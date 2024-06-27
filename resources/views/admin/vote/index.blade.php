@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        {{-- Bottone per sidebar --}}
        <button class="btn rounded border mb-3 d-block d-sm-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="image_right positon-relative z-n1">
            <img src="/img/votes_green.png" alt="">
        </div>
        <div class="image_left positon-relative z-n1">
            <img src="/img/informations-right.png" alt="">
        </div>

        <div class="wrapper bg_dark_transparent w-100 p-4 mb-4 shadow rounded-lg">

            <h3 class="display-5 fw-bold my_primary">Your votes</h3>

            @if ($votes)
                <div class="row align-items-center mb-4">
                    <div class="col-4 col-lg-6">
                        <h4>
                            Hi Dr. <span class="my_primary text-decoration-underline">{{ $doctorProfile->surname }}</span>,
                            you received
                            <span class="my_primary text-decoration-underline">{{ $numberVotes }}</span> votes, for an
                            average of :
                        </h4>
                    </div>
                    <div class="col-4 col-lg-6 text-nowrap">
                        <span class="ms-3 mb-2 text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $average)
                                    <i class="fa-solid fa-star fa-xl" style="color: #FFD43B;"></i>
                                @else
                                    <i class="fa-regular fa-star fa-xl" style="color: #FFD43B;"></i>
                                @endif
                            @endfor

                        </span>
                    </div>
                </div>

                <div class="wrapper bg_dark_transparent col-12 col-lg-6 col-xxl-4 p-3 shadow px-2 py-3 rounded-4">

                    <div class="mb-2">
                        If you want to keep an eye on them, they are divided like this :
                    </div>


                    @for ($i = 1; $i <= 5; $i++)
                        <div class="mb-2 row align-items-center px-3">
                            <div class="col-6">
                                You got <?php echo count($votes->where('vote', $i)); ?> votes with
                            </div>
                            <div class="col-6 stars_wrapper d-inline rounded-3">
                                @for ($j = 1; $j <= 5; $j++)
                                    @if ($j <= $i)
                                        <i class="fa-solid fa-star fa-xl" style="color: #FFD43B;"></i>
                                    @else
                                        <i class="fa-regular fa-star fa-xl" style="color: #FFD43B;"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    @endfor

                </div>
            @endif

        </div>
    </div>
@endsection
