@extends('layouts.app');

@section('content')
    <div class="container py-5">
        <div class="row flex-column gy-5">
            <div class="col-6 d-flex flex-column align-items-center mx-auto">
                <h1 class="col-6 mx-auto bg-secondary rounded text-center my_primary py-1 shadow">
                    Dr. {{ $doctorProfile->user->name }} {{ $doctorProfile->surname }}
                </h1>
                <div class="badge bg-dark text-light mt-3 py-2 px-5">
                    Average grade
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
            </div>
            <div class="col-6 mx-auto">
                <div class="table-responsive">
                    <table class="table table-warning">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">Vote</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($votes as $vote)
                                <tr class="text-center">
                                    <td scope="row">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $vote->vote)
                                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            @else
                                                <i class="fa-regular fa-star" style="color: #FFD43B;"></i>
                                            @endif
                                        @endfor
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
