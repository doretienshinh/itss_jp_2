@extends('layouts.app')

@section('content')

    <head>
        <style>
            .dot {
                height: 10px;
                width: 10px;
                background-color: blue;
                border-radius: 50%;
                display: inline-block;
            }

            .dot1 {
                height: 10px;
                width: 10px;
                background-color: red;
                border-radius: 50%;
                display: inline-block;
            }
        </style>
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <div class="container">
        <div class="row mt-3 mb-3">
            <div class="col-3 pt-3">
                {{ \Carbon\Carbon::now()->month }} 月<br>
                必要: {{ $spendingOfMonthlyType1->sum('amount') }}$<br>
                自身: {{ $spendingOfMonthlyType2->sum('amount') }}$<br>
                貯金: {{ $spendingOfMonthlyType3->sum('amount') }}$<br>
            </div>
            <div class="col-9">
                <div class="card">
                    <canvas id="myChart" class="chart "></canvas>
                </div>
            </div>
        </div>

        <div class="row mb-3" style="margin-left:0; margin-right:0;">
            <div class="card">
                <div style="text-align:center">
                    <span class="dot"></span> <span style="margin-right: 12px">支出</span>
                    <span class="dot1"></span> 月収
                </div>
                <canvas id="myChart1" class="chart1" style="width:100%;"></canvas>
            </div>
        </div>

    </div>

    <script>
        var xValues = ["必要", "自身", "貯金"];
        var yValues = [{{ $spendingOfMonthlyType1->sum('amount') }}, {{ $spendingOfMonthlyType2->sum('amount') }},
            {{ $spendingOfMonthlyType3->sum('amount') }}
        ];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            }
        });

        var xValues1 = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

        new Chart("myChart1", {
            type: "line",
            data: {
                labels: xValues1,
                datasets: [{
                    type: 'bar',
                    data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                    borderColor: "red",
                    fill: false
                }, {
                    type: 'line',
                    data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
                    borderColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                },
                // scales: {
                //     x: {
                //         type: 'time'
                //     }
                // }
            }
        });
    </script>
@endsection
