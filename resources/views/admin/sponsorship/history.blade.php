@extends('layouts.admin')

@section('content')
    <div class="container py-5">

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

            <h3 class="display-5 fw-bold my_primary">Your sponsorship history</h3>
            <h4 class="mb-4">Hi Dr. <span
                    class="text-decoration-underline my_primary">{{ $doctorProfile->surname }}</span>, here you can find all
                the sponsorship you bought</h4>

            @if ($sponsorships)
                <div class="table-responsive">

                    <table class="table table-light border border-2 table-striped table-bordered table-hover text-center">

                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Period</th>
                                <th scope="col">Price</th>
                                <th scope="col">Purchase date</th>
                                <th scope="col">Expiration date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($sponsorships as $sponsorship)
                                <tr class="">
                                    <td scope="row">
                                        {{ $sponsorship->name }}

                                    </td>

                                    <td>
                                        {{ $sponsorship->period }} h
                                    </td>
                                    <td>
                                        {{ $sponsorship->price }} €
                                    </td>
                                    <td>
                                        {{ $sponsorship->pivot_created_at }}
                                    </td>
                                    <td>
                                        {{ $sponsorship->pivot_expiration_date }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        No sponsorships yet
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>


                    </table>



                </div>
                {{ $sponsorships->links() }}
            @else
                <h4>You don't have any review yet.</h4>
            @endif
        </div>


    </div>


    </div>
@endsection
