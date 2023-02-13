@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">

                    <div class="col-md-6 offset-md-3">
                        <input id="name" type="text" class="form-control-lg col-12 @error('name') is-invalid @enderror" name="name" placeholder="Tên:" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <input id="email" type="email" class="form-control-lg col-12 @error('email') is-invalid @enderror" name="email" placeholder="Email:" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <input id="password" type="password" class="form-control-lg col-12 @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu:" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <input id="password-confirm" type="password" class="form-control-lg col-12" name="password_confirmation" placeholder="Xác nhận mật khẩu:" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary col-12 btn-lg">
                            {{ __('Tạo tài khoản') }}
                        </button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 offset-md-3 text-success h5">
                        {{ __('Đã có tài khoản？') }}
                    </div>
                    <div class="col-md-2 h5">
                            @if (Route::has('login'))
                                <a class="nav-link text-primary" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                            @endif
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div>
@endsection
