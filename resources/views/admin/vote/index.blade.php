@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row flex-column gy-5">
            <div class="col-6 d-flex flex-column align-items-center mx-auto">
                <h1 class="col-6 mx-auto bg-secondary rounded text-center my_primary py-1 shadow">
                    Dr. {{ $doctorProfile->surname }} {{ $doctorProfile->user->name }}
                </h1>
                <div class="badge bg-dark text-light mt-3 py-2 px-5">
                    <p>So far, you received {{ $numberVotes }} votes, for an average grade of: </p>

                    <span class="text-warning ms-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $average)
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            @else
                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                            @endif
                        @endfor
                    </span>

                </div>
                <div class="badge bg-dark text-light mt-3 py-2 px-5">

                    <p>If you want to keep an eye on them, they are divided like this: </p>

                    <span>

                        @for ($i = 1; $i <= 5; $i++)
                            <div>
                                You got <?php echo count($votes->where('vote', $i)); ?> votes with {{ $i }} stars
                            </div>
                        @endfor

                    </span>
                </div>
            </div>

        </div>
    </div>
@endsection
