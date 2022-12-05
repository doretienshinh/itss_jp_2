@extends('layouts.app')

@section('content')
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

            <div class="row mb-3" style="margin-top: 12px">
                <div class="col-md-6 offset-md-3">
                    <label>名前:</label>
                    <input class="form-control-lg col-12">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label>メール:</label>
                    <input id="email" type="email" class="form-control-lg col-12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label>パスワード:</label>
                    <input id="password" type="password" class="form-control-lg col-12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label>以前のパスワード:</label>
                    <input id="password" type="password" class="form-control-lg col-12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3">
                    <label>新しいパスワード:</label>
                    <input id="password" type="password" class="form-control-lg col-12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-3 text-center">
                    <button type="button" class="btn btn-primary">アップデート</button>
                </div>
            </div>

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
@endsection