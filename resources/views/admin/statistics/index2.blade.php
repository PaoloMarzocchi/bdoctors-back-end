@extends('layouts.admin')

@section('content')
  <div>
    <div class="container py-4">

      <div class="image_right positon-relative z-n1">
        <img src="/img/statistics.png" alt="">
      </div>
      <div class="image_left positon-relative z-n1">
        <img src="/img/informations-right.png" alt="">
      </div>

      <div class="wrapper bg_dark_transparent w-100 p-4 mb-4 shadow rounded-lg ">
        <h3 class="display-5 fw-bold my_primary">
          Your statistics
        </h3>

        <div class="row">

          {{-- Message chart --}}
          <div class="col-6 py-3">
            <h5 class="display-6 fw-bold my_primary">Messages</h5>
            <div id="messageChartContainer" class="card shadow" data-message-labels="{{ json_encode($messageLabels) }}"
              data-message-data="{{ json_encode($messageData) }}">
              <canvas id="messageChart"></canvas>
            </div>
          </div>

          {{-- Review chart --}}
          <div class="col-6 py-3">
            <h5 class="display-6 fw-bold my_primary">Reviews</h5>
            <div id="reviewChartContainer" class="card shadow" data-review-labels="{{ json_encode($reviewLabels) }}"
              data-review-data="{{ json_encode($reviewData) }}">
              <canvas id="reviewChart"></canvas>
            </div>
          </div>
        </div>

      </div>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@2.0.0"></script>


  @vite(['resources/js/statistics.js'])
@endsection
