@extends('layouts.app');

@section('content')
    <div>
        <div class="container py-4">
            <h1 class="mx-auto rounded text-center my_primary py-3 shadow">
                My Statistics
            </h1>
            <div class="row py-3 text-center">
                <div class="col-12">
                    <div class="card shadow">
                        <h2>Primo grafico</h2>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col-6 py-3">
                    <div class="card shadow">
                        <h2>Secondo grafico</h2>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
                <div class="col-6 py-3">
                    <div class="card shadow">
                        <h2>Terzo grafico</h2>
                        <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>
            <canvas id="myChart"></canvas>
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
