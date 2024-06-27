@extends('layouts.admin')

@section('content')
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

                <div class="col-6 py-3">

                    <h4 class="display-6 fw-bold my_primary">Votes by month</h4>
                    <div id="voteChartContainer" class="card shadow" data-vote-labels="{{ json_encode($voteLabels) }}"
                        data-vote-data="{{ json_encode($voteData) }}">
                        <canvas id="voteChart"></canvas>
                    </div>

                </div>
                {{-- Message chart --}}
                <div class="col-6 py-3">
                    <h5 class="display-6 fw-bold my_primary">Messages</h5>
                    <div id="messageChartContainer" class="card shadow"
                        data-message-labels="{{ json_encode($messageLabels) }}"
                        data-message-data="{{ json_encode($messageData) }}">
                        <canvas id="messageChart"></canvas>
                    </div>
                </div>



            </div>

            <div class="row">

                <div class="col-6 py-3">
                    <h4 class="display-6 fw-bold my_primary">Votes by type</h4>
                    <div class="card shadow">
                        <canvas id="myPieChart"></canvas>
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



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@2.0.0"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctxPie = document.getElementById('myPieChart').getContext('2d');
                var myPieChart = new Chart(ctxPie, {
                    type: 'doughnut',
                    data: {
                        labels: ['Vote 1', 'Vote 2', 'Vote 3', 'Vote 4', 'Vote 5'],
                        datasets: [{
                            label: 'Votes by type',
                            data: @json($voteCounts),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(1) + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
        @vite(['resources/js/statistics.js'])
    @endsection
