@extends('layouts.app')

@section('content')
    
<div>
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
</div>

@endsection