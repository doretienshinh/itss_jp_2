@extends('layouts.app')

@section('content')

<div>
	<form method="POST" action="{{ route('profile.update', auth()->user()) }}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<div class="row mb-3" style="margin-top: 12px">
			<div class="col-md-6 offset-md-3">
				<label>Tên:</label>
				<input name="name" type="text" class="form-control-lg col-12 @error('name') is-invalid @enderror"
					value="{{ auth()->user()->name }}">
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6 offset-md-3">
				<label>Email:</label>
				<input class="form-control-lg col-12" disabled value="{{ auth()->user()->email }}">
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6 offset-md-3">
				<label>Password mới:</label>
				<input type="password" class="form-control-lg col-12 @error('password') is-invalid @enderror" name="password"
					autocomplete="current-password">
				@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6 offset-md-3">
				<label>Xác nhận password mới:</label>
				<input type="password" class="form-control-lg col-12 @error('password_confirmation') is-invalid @enderror"
					name="password_confirmation">
				@error('password_confirmation')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>

		<div class="row mb-3">
            <div class="col-md-6 offset-md-3">
				<label>Avatar:</label>
				<input type="file" class="form-control-lg col-12 @error('avatar') is-invalid @enderror"
					name="avatar">
				@error('avatar')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-6 offset-md-3 text-center">
				<button type="submit" class="btn btn-primary">Cập nhật</button>
			</div>
		</div>
	</form>
</div>

@endsection
