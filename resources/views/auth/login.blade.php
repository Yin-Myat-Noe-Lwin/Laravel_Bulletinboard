@extends('layouts.app')

@section('content')

    <div class="container my-5">
      <h2 class="text-center pt-5">Log In</h2>
      <div class="d-flex justify-content-center align-items-center">
      <div class="card my-4" style="width: 400px;">
        <div class="card-body p-4">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            @if(isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div>
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <p><a href="{{ route('auth.forgot') }}" class="forget-btn">Forgot?</a></p>
            <button class="btn btn-primary login-btn mb-3">Login</button>
            <div class='mt-4 mb-3 d-flex align-items-center'>
                <div class='custom-line'></div>
                <p class='border mb-0 or-info border-default rounded d-inline-block px-2 py-1 text-black-50'>OR</p>
                <div class="custom-line"></div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
              <a href="{{ url('auth/facebook') }}"><i class="fa-brands fa-facebook login-icon"></i></a>
            </div>
          </form>
          <p class="text-center pt-3">Not a member?<a href="{{ route('auth.register') }}" class="register-link">Sign up</a></p>
        </div>
      </div>
      </div>
    </div>
@endsection

