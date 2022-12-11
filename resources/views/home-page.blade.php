@extends('layouts.app')

@section('content')
    

<head>
    <style>
        .test {
            background-color: #F4CCCC;
            margin-right: 5px;
            margin-left: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid black;
        }
        
        .pay {
            background-color: #FCE5CD;
            border: 1px solid black;
            width: 85px;
            height:50px;
            position: relative;
            left: 85%;
            bottom: 50px;
            display:flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<div class="container" style="height: 395px; overflow:auto">
    {{-- <div class="test">
        <div style="display: flex">
            <div style="margin-right: 140px"> 日付:  14/08/2022 </div> 
            <div> 口座残高: -35$ </div>
        </div>
        ウォレット:  ABC <br>
        ノート:  昼食代を支払う <br>
        タイプ:  必要 <br>
    </div> --}}
    @for ($i = 0; $i < 3; $i++)
    <div class="test">
        <div style="display: flex">
            <div style="margin-right: 200px"> 日付:  14/08/2022 </div> 
            <div> 口座残高: -35$ </div>
        </div>
        ウォレット:  ABC <br>
        ノート:  昼食代を支払う <br>
        タイプ:  必要 <br>
    </div>
    @endfor
    
    <div class="pay">
        支出追加
    </div>
</div>

<script>

</script>

@endsection