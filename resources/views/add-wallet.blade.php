@extends('layouts.app')

@section('content')
    <div class="container" style="min-height: 500px">
        <div class="card col-6 mx-auto p-2" style="margin-top: 10px; border: 2px solid darkorange">
			<div style="width: 85%; display: block; margin: auto;">
				<label><strong>ウォレット</strong></label>
				<input type="text" class="form-control" style="display: block; margin: auto;" placeholder="新しいウォレット">
			</div>

            <div style="width: 85%; display: block; margin: auto;">
                <table class="table table-borderless" style="margin-top: 10px">
                    <tr>
                        <td style="width: 50%;">
                            <button type="button" class="btn btn-danger" style="display: block; margin: auto; width: 90%">キャンセル</button>
                        </td>
                        <td style="width: 50%">
                            <button type="button" class="btn btn-success" style="display: block; margin: auto; width: 90%">保存</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
