@extends('layouts.app')

@section('content')
    <form action="{{ route('wallet.active') }}" method="post">
        <div class="row justify-content-center">
            @csrf
            <table class="table table-borderless" style="width: 60%; margin-top: 30px">
                <tr>
                    <td style="text-align: center">Chia ví</td>
                    <td style="padding-left: 5px"></td>
                    <td style="padding: 0px; width: 50%;">
                        <select style="width: 170px; text-align: center; height: 40px; display: block; margin: auto; border-radius: .5em;" name="wallet_id">
                            @foreach ($wallets as $wallet)
                                <option value="{{ $wallet->id }}" {{ $wallet->id == $walletUsing->id ? ' selected' : '' }}>
                                    {{ $wallet->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
    
                <tr>
                    <td style="padding-top: 15px"></td>
                    <td style="padding-left: 5px"></td>
                    <td style="padding-top: 15px"></td>
                </tr>
    
                <tr>
                    <td style="text-align: center">Thông báo</td>
                    <td style="padding-left: 5px"></td>
                    <td style="padding: 0px;">
                        <select style="width: 170px; text-align: center; height: 40px; display: block; margin: auto; border-radius: .5em;">
                            <option value="0">Hàng ngày</option>
                            <option value="1">Hàng tuần</option>
                            <option value="2">Tắt</option>
                        </select>
                    </td>
                </tr>
            </table>
    
            <table class="table table-borderless" style="width: 60%">
                <tr>
                    <td style="width: 50%">
                        <button type="button" class="btn btn-warning" style="display: block; margin: auto;" data-toggle="modal"
                            data-target="#exampleModal">Thêm ví</button>
                    </td>
                    <td style="padding-left: 5px"></td>
                    <td style="width: 50%">
                        <button type="submit" class="btn btn-success" style="display: block; margin: auto;">Lưu</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Ví</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('wallet.store') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="text" placeholder="Tên ví" name="name"
                            style="width: 100%; border: 0; border-bottom: 1px solid black;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Thêm ví</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
