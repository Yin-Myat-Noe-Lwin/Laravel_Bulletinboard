@extends('layouts.app')

@section('content')

    <div class="container my-5">
      <div class="d-flex justify-content-center align-items-center">
      <div class="card my-5" style="width: 400px;">
        <div class="card-body p-4">
          <h2 class="txt-primary">Forgot Password</h2>
          <form method="POST" action="{{ route('auth.forgot') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button class="btn btn-primary login-btn">Confirm</button>
          </form>
        </div>
      </div>
      </div>
    </div>
@endsection

