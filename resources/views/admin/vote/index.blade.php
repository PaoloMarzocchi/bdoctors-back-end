@extends('layouts.admin')

@section('content')
    <div class="container py-5">

        <div class="image_right z-n1">
            <img src="/img/votes_green.png" alt="">
        </div>
        <div class="image_left z-n1">
            <img src="/img/informations-right.png" alt="">
        </div>

        <div class="wrapper w-100 p-4 mb-4 shadow rounded-lg">

            <h3 class="display-6 fw-bold my_primary">Your votes</h3>

            @if ($votes)
                <div class="d-flex align-items-center mb-4">

                    <h4> Hi dr. {{ $doctorProfile->surname }}, you received {{ $numberVotes }} votes, for an
                        average of:
                    </h4>

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

                <div class="col-4 p-3 shadow px-2 py-3 rounded-4">

                    <div class="mb-2">If you want to keep an eye on them, they are divided like this: </div>

                    <span>

                        @for ($i = 1; $i <= 5; $i++)
                            <div class="mb-2">
                                You got <?php echo count($votes->where('vote', $i)); ?> votes with
                                @for ($j = 1; $j <= 5; $j++)
                                    @if ($j <= $i)
                                        <i class="fa-solid fa-star fa-xl" style="color: #FFD43B;"></i>
                                    @else
                                        <i class="fa-regular fa-star fa-xl" style="color: #FFD43B;"></i>
                                    @endif
                                @endfor
                            </div>
                        @endfor

                    </span>
                </div>
            @else
                <h4>You don't have any vote yet.</h4>
            @endif

        </div>
    </div>
@endsection
