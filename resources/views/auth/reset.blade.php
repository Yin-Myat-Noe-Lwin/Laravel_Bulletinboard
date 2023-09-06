@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="d-flex justify-content-center align-items-center">
    <div class="card my-5"  style="width: 400px;">
      <div class="card-body">
        <h2 class="txt-primary">Reset Password</h2>
        <form method="POST" action="{{ route('reset') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $user->email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
              @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button class="btn btn-primary login-btn">Update</button>
            </div>
          </form>
      </div>
    </div>
    </div>
  </div>
@endsection
