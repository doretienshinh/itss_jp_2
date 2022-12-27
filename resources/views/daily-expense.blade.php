@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 500px">
        <div class="card col-6 mx-auto p-2">
            <div class="row">
                <div class="row">
                    <div class="col-6">Ví: <span>ABC</span></div>
                    <div class="col-6">Tiền trong ví: <span>50đ</span></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="type">Loại</label>
                        <select id="type">
                            <option value="">Cần thiết</option>
                            <option value="">Cá nhân</option>
                            <option value="">Tiết kiệm</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3" style="margin-top: 10px; border-top: 1px solid lightgrey;">
                <div class="">
                    <label>Ghi chú:</label>
                    <textarea id="note" type="note" style="margin-top: 10px; min-height: 100px"
                        class="form-control @error('note') is-invalid @enderror"></textarea>
                    @error('note')
                    @enderror
                </div>
            </div>
            <!--  -->
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item col-6">
                    <a class="nav-link active bg-success" aria-current="page" href="#">Thêm chi tiêu</a>
                </li>
                <li class="nav-item col-6">
                    <a class="nav-link bg-danger" href="#" style="color: white">Hủy</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
