@extends('layouts.app')

@section('content')
    
<!DOCTYPE html>
<html>
<head>
    <style>
        .chart {
            position: relative;
            left: 45%;
            bottom: 23%;
            margin-bottom: 10px;
        }

        .textt{
            position: relative;
            left:10%;
            top:20%;
        }

        .chart1 {
            margin: 0 auto;
        }

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
<body>
<div class="right">
    <div class="textt">
        8月<br>
        必要: 2000$<br>
        自身: 2000$<br>
        貯金: 2000$<br>
    </div>
    <canvas id="myChart" class="chart" style="width:70%;max-width:600px"></canvas>

</div>
<div style="text-align:center">
    <span class="dot"></span> <span style="margin-right: 12px">支出</span>  
    <span class="dot1"></span> 月収  
</div>
<canvas id="myChart1" class="chart1" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["貯金", "自身", "必要"];
var yValues = [19, 28, 53];
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

var xValues1 = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart1", {
  type: "line",
  data: {
    labels: xValues1,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>

</body>
</html>

@endsection