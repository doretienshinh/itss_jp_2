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

<div class="spending">
    <br>
    <hr>
    <hr>
    <h2>日々の支出を記録する画面-Daily Expenses Screen</h2>
    <!--  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center" style="border-bottom: 1px solid lightgrey">
              <img src="https://cdn-icons-png.flaticon.com/512/4128/4128176.png"
                alt="Avatar" class="img-fluid my-4" style="width: 100px; height: 100px" />
              <h5 style="color: black">User's name</h5>
            </div>

            <div class="col-md-8" style="border-bottom: 1px solid lightgrey">
              <div class="card-body p-4">
                <table class="table table-borderless" style="width:50%">
                    <tr>
                        <td><strong>ウォレット</strong></td>
                        <td>ABC</td>
                    </tr>
                    <tr>
                        <td><strong>総収入</strong></td>
                        <td>$$$</td>
                    </tr>
                    <tr>
                        <td><strong>総支出</strong></td>
                        <td>$$$</td>
                    </tr>
                </table>
              </div>
            </div>
            <!--  -->
        <div class="row justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem; margin-top: 10px;">
        <div class="row g-0">
            <div class="" style="border: 1px solid lightgrey">
              <div class="card-body p-4">
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
              </div>
            </div>
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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">追加する</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">キャンセル</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--  -->
            <ul class="nav nav-pills nav-fill" style="border: solid 0.5px lightgrey; border-radius: 7px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">支出管理</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">レポート</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">設定</a>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>
</div>

@endsection