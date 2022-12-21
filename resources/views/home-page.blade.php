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
    <div class="{{ $spending->amount > 0 ? 'plus' : 'minus' }} spending-item" data-id="{{$spending->id}}" data-toggle="modal" data-target="#exampleModal{{$spending->id}}">
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
        <div class="modal-dialog" role="document" style="margin-top: 15%">
          <div class="modal-content p-3">
          <form action="{{ route('daily-expense.store') }}" method="post">
            @csrf
            <div>
              <div class="mx-auto p-2">
                  <div class="row mb-2">
                      <div class="row" style="white-space: nowrap;">
                          <div class="col-6">ウォレット: <span>{{ $wallet->name }}</span></div>
                          <input type="hidden" name="wallet_id" value={{ $wallet->id }}>
                          <div class="col-6 d-flex">支出: <input type="amount" name="amount" style="border: 0; border-bottom: 1px solid black;"></div>
                      </div>
                      <div class="row mt-2">
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
                  <div class="row mb-3" style="padding-top: 10px; border-top: 1px solid gray; ">
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
                          <button class="nav-link bg-danger" style="color: white"  data-dismiss="modal">キャンセル</button>
                      </li>
                  </ul>
              </div>
          </div>
          </form>
          </div>
        </div>
      </div>
      @foreach ($spendings as $spending)
        <div class="modal fade modal{{ $spending->id }}" id="exampleModal{{ $spending->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe{{ $spending->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document" style="margin-top: 15%">
            <div class="modal-content p-3">
            <form action="{{ route('daily-expense.update', $spending->id) }}" method="post">
                @csrf
                <div>
                <div class="mx-auto p-2">
                    <div class="row mb-2">
                        <div class="row" style="white-space: nowrap;">
                            <div class="col-6">ウォレット: <span>{{ $wallet->name }}</span></div>
                            <input type="hidden" name="wallet_id" value={{ $wallet->id }}>
                            <div class="col-6 d-flex">支出: <input type="amount" name="amount" style="border: 0; border-bottom: 1px solid black;" value="{{$spending->amount}}"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <label for="type">タイプ:</label>
                                <select id="type" name="type_id">
                                    @foreach ($SpendingTypes as $SpendingType)
                                        <option value="{{ $SpendingType->id }}" {{$spending->type_id == $SpendingType->id ? ' selected' : '' }}>{{ $SpendingType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="padding-top: 10px; border-top: 1px solid gray; ">
                        <div class="">
                            <label>ノート:</label>
                            <textarea id="note" name="note" style="margin-top: 10px; min-height: 100px"
                                class="form-control @error('note') is-invalid @enderror">{{ $spending->note }}</textarea>
                            @error('note')
                            @enderror
                        </div>
                    </div>
                    <!--  -->
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item col-6">
                            <button type=submit class="nav-link active bg-success" aria-current="page" href="#">修正</button>
                        </li>
                        <li class="nav-item col-6">
                            <a class="nav-link bg-danger" style="color: white"  href="{{ route('daily-expense.delete', $spending->id) }}">消す</a>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
            </div>
            </div>
        </div>
      @endforeach
</div>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('.spending-item').click(function(){
    $('.modal2').modal('show');
    console.log(this.getAttribute('data-id'));
    // $.ajax({
    //         type: 'GET',
    //         dataType: 'JSON',
    //         url: ,
    //         success: function (result) {}, 
    //         error: function(result) {
    //         }
    //     })
    });
// console.log(1);
</script>

@endsection