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
                Tháng {{ \Carbon\Carbon::now()->month }}<br>
                Cần thiết: {{ number_format($spendingOfMonthlyType1->sum('amount')) }}đ<br>
                Cá nhân: {{ number_format($spendingOfMonthlyType2->sum('amount')) }}đ<br>
                Tiết kiệm: {{ number_format($spendingOfMonthlyType3->sum('amount')) }}đ<br>
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
                    <span class="dot"></span> <span style="margin-right: 12px">Thu chi</span>
                    <span class="dot1"></span> Toàn bộ
                </div>
                <canvas id="myChart1" class="chart1" style="width:100%;"></canvas>
            </div>
        </div>

    </div>

    <script>
        var amountInDays = @json($amountInDays).reverse();
        var spendingInDays = @json($spendingInDays);
        // spendingInDays = spendingInDays.map(s => s >= 0 ? 0 : -s);
        console.log(amountInDays);
        console.log(spendingInDays);
        var xValues = ["Cần thiết", "Cá nhân", "Tiết kiệm"];
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
        var xValues1 = [];
        var days = {{ $days }};
        for(let i = 0; i < days ; i++){
            xValues1.push(i + 1);
        }
        new Chart("myChart1", {
            type: "line",
            data: {
                labels: xValues1,
                datasets: [{
                    type: 'line',
                    data: amountInDays,
                    borderColor: "red",
                    fill: false
                }, {
                    type: 'bar',
                    data: spendingInDays,
                    borderColor: "blue",
                    backgroundColor: "blue",
                    fill: false
                }]
            },
            options: {
                legend: {
                    display: false
                },
            }
        });
    </script>
@endsection
