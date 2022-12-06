@extends('layouts.auth')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <input id="email" type="email" class="form-control-lg col-12 @error('email') is-invalid @enderror" name="email" placeholder="メール:" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <input id="password" type="password" placeholder="パスワード:" class="form-control-lg col-12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <!-- <div class="row mb-0">
                    <div class="col-md-8 offset-md-6 h5">
                        @if (Route::has('password.request'))
                        <a class="nav-link text-danger" href="{{ route('password.request') }}">
                            {{ __('パスワードを忘れる？') }}
                        </a>
                        @endif
                    </div>
                </div> -->

                <div class="row mb-3">
                    <div class="col-6 offset-md-3">
                        <button type="submit" class="btn btn-primary btn-lg col-12">
                            {{ __('ログイン') }}
                        </button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-5 offset-md-2 text-success text-end h5">
                        {{ __('アカウントを持っていませんか？') }}
                    </div>
                    <div class="col-md-3 h5">
                        @if (Route::has('register'))
                        <a class="nav-link text-start text-primary" href="{{ route('register') }}">{{ __('サインアップ') }}</a>
                        @endif
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>



@endsection