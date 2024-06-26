@extends('layouts.admin')

@section('content')
    <div>
        <div class="container py-4">

            <div class="image_right">
                <img src="/img/statistics.png" alt="">
            </div>
            <div class="image_left">
                <img src="/img/informations-right.png" alt="">
            </div>

            <div class="wrapper w-100 p-4 mb-4 shadow rounded-lg">
                <h3 class="display-6 fw-bold my_primary">
                    Your statistics
                </h3>

            </div>

            <div class="wrapper w-100 p-4 mb-4 shadow rounded-lg">
                <div class="row py-3 text-center">
                    <div class="col-12">
                        <div class="card shadow">
                            <h4 class="display-6 fw-bold my_primary">Primo grafico</h4>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-6 py-3">
                        <div class="card shadow">
                            <h4 class="display-6 fw-bold my_primary">Secondo grafico</h4>
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                    <div class="col-6 py-3">
                        <div class="card shadow">
                            <h4 class="display-6 fw-bold my_primary">Terzo grafico</h4>
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx2 = document.getElementById('myChart2');

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx3 = document.getElementById('myChart3');

        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
