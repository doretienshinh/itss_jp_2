@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
	<table class="table table-borderless" style="width: 60%; margin-top: 30px">
		<tr>
			<td style="text-align: center; border: 1px solid black;">ウォレット分け</td>
			<td style="padding-left: 5px"></td>
			<td style="padding: 0px; width: 50%;">
				<select style="width: 170px; text-align: center; height: 40px; display: block; margin: auto;">
					<option value="0">シングルウォレット</option>
					<option value="1">50/30/20 ウォレット</option>
					<option value="2">6瓶ウォレット</option>
				</select>
			</td>
		</tr>

		<tr>
			<td style="padding-top: 15px"></td>
			<td style="padding-left: 5px"></td>
			<td style="padding-top: 15px"></td>
		</tr>

		<tr>
			<td style="text-align: center; border: 1px solid black;">ウォレット分け</td>
			<td style="padding-left: 5px"></td>
			<td style="padding: 0px;">
				<select style="width: 170px; text-align: center; height: 40px; display: block; margin: auto;">
					<option value="0">毎日</option>
					<option value="1">毎月</option>
					<option value="2">オフ</option>
				</select>
			</td>
		</tr>
	</table>

	<table class="table table-borderless" style="width: 60%">
		<tr>
			<td style="width: 50%">
				<button type="button" class="btn btn-warning" style="display: block; margin: auto;">ウォレットを追加</button>
			</td>
			<td style="padding-left: 5px"></td>
			<td style="width: 50%">
				<button type="button" class="btn btn-success" style="display: block; margin: auto;">保存</button>
			</td>
		</tr>
	</table>
</div>

@endsection
