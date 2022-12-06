@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 mx-auto bg-info">
        <table class="table table-borderless" style="">
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
        </table>
        <div class="row mb-3">
            <div class="">
                <label>ノート:</label>
                <input id="note" type="note" style="border: 1px solid lightgrey" class="form-control @error('note') is-invalid @enderror">
                @error('note')
                @enderror
            </div>
        </div>
        <!--  -->
        <ul class="nav nav-pills nav-fill" style="border: solid 0.5px lightgrey; border-radius: 7px;">
            <li class="nav-item col-7">
            <a class="nav-link active bg-success" aria-current="page" href="#">追加する</a>
            </li>
            <li class="nav-item col-5">
            <a class="nav-link bg-danger" href="#">キャンセル</a>
            </li>
        </ul>
    </div>
</div>


@endsection