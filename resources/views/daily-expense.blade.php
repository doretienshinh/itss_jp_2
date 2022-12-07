@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 500px">
        <div class="card col-6 mx-auto p-2">
            {{-- <table class="table table-borderless" style="">
            <tr>
                <td><strong>ウォレット</strong></td>
                <td>ABC</td>
            </tr>
            <tr>
                <td><strong>口座残高:</strong></td>
                <td>50$</td>
            </tr>
            <tr>
                <td><strong>タイプ:</strong></td>
                <td>                        
                    <select id="type">
                    <option value="">必要</option>
                    <option value="">自身</option>
                    <option value="">貯金</option>
                    </select>
                </td>
            </tr>
        </table> --}}
            <div class="row">
                <div class="row">
                    <div class="col-6">ウォレット: <span>ABC</span></div>
                    <div class="col-6">口座残高: <span>50$</span></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="type">タイプ:</label>
                        <select id="type">
                            <option value="">必要</option>
                            <option value="">自身</option>
                            <option value="">貯金</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3" style="margin-top: 10px; border-top: 1px solid lightgrey;">
                <div class="">
                    <label>ノート:</label>
                    <textarea id="note" type="note" style="margin-top: 10px; min-height: 100px"
                        class="form-control @error('note') is-invalid @enderror"></textarea>
                    @error('note')
                    @enderror
                </div>
            </div>
            <!--  -->
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item col-6">
                    <a class="nav-link active bg-success" aria-current="page" href="#">追加する</a>
                </li>
                <li class="nav-item col-6">
                    <a class="nav-link bg-danger" href="#" style="color: white">キャンセル</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
