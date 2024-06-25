@extends('layouts.admin');

@section('content')
  <div class="container">
    <div class="row flex-column gap-5">
      <div class="col-6 d-flex flex-column align-items-center mx-auto">

        <h2 class="display-5 fw-bold my_primary my-5">Your messages</h2>

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
