@extends('layouts.app')

@section('content')

<head>
    <style>
        .spending-item {
            padding: .5em;
            margin-right: 5px;
            margin-left: 5px;
            margin-top: 15px;
            margin-bottom: 15px;
            border: 1px solid black;
            border-radius: .6em;
        }

        .plus {
            background-color: #51d140;
        }
        .minus {
            background-color: #F4CCCC;
        }
        .pay {
            left: 80%;
            bottom: 50px;
            display:flex;
            justify-content: center;
            align-items: center;
        }
        div.pay{
          position: absolute;
          z-index: 999;
        }
    </style>
</head>
<div style="height: 100%; overflow:auto">
    @foreach ($spendings as $spending)
    <div class="{{ $spending->amount > 0 ? 'plus' : 'minus' }} spending-item" data-id="{{$spending->id}}" data-toggle="modal" data-target="#exampleModal{{$spending->id}}" style="cursor: pointer">
        <div style="display: flex">
            <div style="margin-right: 200px"> Ngày:  {{ $spending->created_at->format('Y-m-d') }} </div> 
            <div> Số tiền: {{ number_format($spending->amount) }}đ </div>
        </div>
        Ví:  {{$wallet->name}} <br>
        Ghi chú:  {{ $spending->note }} <br>
        Loại:  {{ $spending->spendingType->name }} <br>
    </div>
    @endforeach
    <div class="pay">
        <button type="button" class="btn btn-success me-2" data-toggle="modal" data-target="#receiveModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
              </svg>
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#payModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
              </svg>
        </button>
    </div>
      
      <!-- Modal -->
      <div class="modal fade" id="receiveModal" tabindex="-1" role="dialog" aria-labelledby="receiveModal" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: 15%">
          <div class="modal-content p-3">
          <form action="{{ route('daily-expense.store') }}" method="post">
            @csrf
            <div>
              <div class="mx-auto p-2">
                  <div class="row mb-2">
                      <div class="row" style="white-space: nowrap;">
                          <div class="col-6">Ví: <span>{{ $wallet->name }}</span></div>
                          <input type="hidden" name="wallet_id" value={{ $wallet->id }}>
                          <div class="col-6 d-flex">Số tiền: <input type="amount" name="amount" style="border: 0; border-bottom: 1px solid black;"></div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-6">
                            <label for="type">Loại:</label>
                            <select id="type" name="type_id" style="border-radius: .2em;">
                              @foreach ($SpendingTypes as $SpendingType)
                              <option value="{{ $SpendingType->id }}">{{ $SpendingType->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                          <label for="type">Thời gian:</label>
                          <input type="date" name="created_at" max="{{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d') }}">
                        </div>
                      </div>
                  </div>
                  <div class="row mb-3" style="padding-top: 10px; border-top: 1px solid gray; ">
                      <div class="">
                          <label>Ghi chú:</label>
                          <textarea id="note" name="note" style="margin-top: 10px; min-height: 100px"
                              class="form-control @error('note') is-invalid @enderror" placeholder="Ghi chú vào - {{ date('Y-m-d') }}"></textarea>
                          @error('note')
                          @enderror
                      </div>
                  </div>
                  <!--  -->
                  <ul class="nav nav-pills nav-fill">
                      <li class="nav-item col-6">
                          <button type=submit class="nav-link active bg-success" aria-current="page" href="#">Thêm thu nhập</button>
                      </li>
                      <li class="nav-item col-6">
                          <button class="nav-link bg-danger" style="color: white"  data-dismiss="modal">Hủy</button>
                      </li>
                  </ul>
              </div>
          </div>
          </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModal" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: 15%">
          <div class="modal-content p-3">
          <form action="{{ route('daily-expense.store') }}" method="post">
            @csrf
            <div>
              <div class="mx-auto p-2">
                  <div class="row mb-2">
                      <div class="row" style="white-space: nowrap;">
                          <div class="col-6">Ví: <span>{{ $wallet->name }}</span></div>
                          <input type="hidden" name="wallet_id" value={{ $wallet->id }}>
                          <div class="col-6 d-flex">Số tiền: -<input type="amount" name="amountFake" style="border: 0; border-bottom: 1px solid black;"></div>
                          <input type="hidden" name="amount" value="">
                      </div>
                      <div class="row mt-2">
                          <div class="col-6">
                              <label for="type">Loại:</label>
                              <select id="type" name="type_id" style="border-radius: .2em;">
                                @foreach ($SpendingTypes as $SpendingType)
                                <option value="{{ $SpendingType->id }}">{{ $SpendingType->name }}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="col-6">
                            <label for="type">Thời gian:</label>
                            <input type="date" name="created_at" max="{{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d') }}>
                        </div>
                      </div>
                  </div>
                  <div class="row mb-3" style="padding-top: 10px; border-top: 1px solid gray; ">
                      <div class="">
                          <label>Ghi chú:</label>
                          <textarea id="note" name="note" style="margin-top: 10px; min-height: 100px"
                              class="form-control @error('note') is-invalid @enderror" placeholder="Ghi chú vào - {{ date('Y-m-d') }}"></textarea>
                          @error('note')
                          @enderror
                      </div>
                  </div>
                  <!--  -->
                  <ul class="nav nav-pills nav-fill">
                      <li class="nav-item col-6">
                          <button type=submit class="nav-link active bg-success" aria-current="page" href="#">Thêm chi tiêu</button>
                      </li>
                      <li class="nav-item col-6">
                          <button class="nav-link bg-danger" style="color: white"  data-dismiss="modal">Hủy</button>
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
                            <div class="col-6">Ví: <span>{{ $wallet->name }}</span></div>
                            <input type="hidden" name="wallet_id" value={{ $wallet->id }}>
                            <div class="col-6 d-flex">Số tiền: <input type="amount" name="amount" style="border: 0; border-bottom: 1px solid black;" value="{{$spending->amount}}"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="type">Loại:</label>
                                <select id="type" name="type_id">
                                    @foreach ($SpendingTypes as $SpendingType)
                                        <option value="{{ $SpendingType->id }}" {{$spending->type_id == $SpendingType->id ? ' selected' : '' }}>{{ $SpendingType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="type">Thời gian:</label>
                                <input type="date" value="{{ $spending->created_at->format('Y-m-d') }}" name="created_at" max="{{ Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d') }}>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" style="padding-top: 10px; border-top: 1px solid gray; ">
                        <div class="">
                            <label>Ghi chú:</label>
                            <textarea id="note" name="note" style="margin-top: 10px; min-height: 100px"
                                class="form-control @error('note') is-invalid @enderror">{{ $spending->note }}</textarea>
                            @error('note')
                            @enderror
                        </div>
                    </div>
                    <!--  -->
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item col-6">
                            <button type=submit class="nav-link active bg-success" aria-current="page" href="#">Cập nhật</button>
                        </li>
                        <li class="nav-item col-6">
                            <a class="nav-link bg-danger" style="color: white"  href="{{ route('daily-expense.delete', $spending->id) }}">Xóa</a>
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
$('#payModal input[name=amountFake]').change(function(){
    let amount = $('#payModal input[name=amountFake]').val();
    $('#payModal input[name=amount]').val(-amount);
})
</script>

@endsection
