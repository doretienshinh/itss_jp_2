@extends('layouts.app')

@section('content')
    

<head>
    <style>
        .plus {
            background-color: #51d140;
            margin-right: 5px;
            margin-left: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid black;
        }
        .minus {
            background-color: #F4CCCC;
            margin-right: 5px;
            margin-left: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid black;
        }
        .pay {
            left: 85%;
            bottom: 50px;
            display:flex;
            justify-content: center;
            align-items: center;
        }
        button.pay{
          position: absolute;
          z-index: 999;
        }
    </style>
</head>
<div class="container" style="height: 395px; overflow:auto">
    @foreach ($spendings as $spending)
    <div class="{{ $spending->amount > 0 ? 'plus' : 'minus' }}">
        <div style="display: flex">
            <div style="margin-right: 200px"> 日付:  {{ $spending->created_at }} </div> 
            <div> 支出: {{ $spending->amount }}$ </div>
        </div>
        ウォレット:  {{$wallet->name}} <br>
        ノート:  {{ $spending->note }} <br>
        タイプ:  {{ $spending->spendingType->name }} <br>
    </div>
    @endforeach
    <button type="button" class="btn btn-success pay" data-toggle="modal" data-target="#exampleModal">
        支出追加
    </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          <form action="{{ route('daily-expense.store') }}" method="post">
            @csrf
            <div>
              <div class="card mx-auto p-2">
                  <div class="row">
                      <div class="row">
                          <div class="col-6">ウォレット: <span style="border-bottom: 1px solid black;">{{ $wallet->name }}</span></div>
                          <input type="hidden" name="wallet_id" value={{ $wallet->id }}>
                          <div class="col-6 d-flex">支出: <input type="amount" name="amount" style="border: 0; border-bottom: 1px solid black;"></div>
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <label for="type">タイプ:</label>
                              <select id="type" name="type_id">
                                @foreach ($SpendingTypes as $SpendingType)
                                <option value="{{ $SpendingType->id }}">{{ $SpendingType->name }}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3" style="margin-top: 10px; border-top: 1px solid lightgrey;">
                      <div class="">
                          <label>ノート:</label>
                          <textarea id="note" name="note" style="margin-top: 10px; min-height: 100px"
                              class="form-control @error('note') is-invalid @enderror"></textarea>
                          @error('note')
                          @enderror
                      </div>
                  </div>
                  <!--  -->
                  <ul class="nav nav-pills nav-fill">
                      <li class="nav-item col-6">
                          <button type=submit class="nav-link active bg-success" aria-current="page" href="#">追加する</button>
                      </li>
                      <li class="nav-item col-6">
                          <button class="nav-link bg-danger" style="color: white">キャンセル</button>
                      </li>
                  </ul>
              </div>
          </div>
          </form>
          </div>
        </div>
      </div>
</div>

<script>

</script>

@endsection