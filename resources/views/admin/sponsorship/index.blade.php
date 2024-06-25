@extends('layouts.admin')

@section('content')

    <div class="container py-4">
        <h2 class="mx-auto rounded text-center my_primary py-3 shadow">
            Our Sponsorhips
        </h2>
        <p class="text-center py-2 text-secondary">
            Purchase one or more types of sponsorship to appear among the first results in searches
        </p>


    @include('partials.session-message')
    <div class="row row-cols-3 my-5">
      @foreach ($sponsorships as $sponsorship)
        <div class="col">
          <div class="card p-3 text-center">
            <form action="{{ route('admin.sponsorship.store') }}" method="post">
              @csrf
              <h4 class="py-3">
                <input type="hidden" style="background-color: inherit; width:100px" class="border-0"
                  name="name-{{ $sponsorship->id }}" id="name-{{ $sponsorship->id }}" placeholder=""
                  value="{{ $sponsorship->name }} " />
                {{ $sponsorship->name }}
              </h4>
              <ul class="list-unstyled">
                <li><strong>Period:</strong>
                  <input type="hidden" style="background-color: inherit; width:100px" class="border-0"
                    name="period-{{ $sponsorship->id }}" id="period-{{ $sponsorship->id }}" placeholder=""
                    value="{{ $sponsorship->period }} " />
                  {{ $sponsorship->period }} h
                </li>
                <li><strong>Price:</strong>
                  <input type="hidden" style="background-color: inherit; width:100px" class="border-0"
                    name="price-{{ $sponsorship->id }}" id="price-{{ $sponsorship->id }}" placeholder=""
                    value="{{ $sponsorship->price }}" />
                  {{ $sponsorship->price }} €
                </li>
              </ul>
              {{-- @dd($sponsorship) --}}

              <button class="btn my_btn_primary px-4 rounded-pill" type="submit">Get this Sponsorship</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>

  </div>
@endsection
