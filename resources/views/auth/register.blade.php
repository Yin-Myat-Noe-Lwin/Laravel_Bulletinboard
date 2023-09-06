@extends('layouts.app')

@section('content')

    <div class="container my-5">
      <div class="d-flex justify-content-center align-items-center">
      <div class="card my-5"  style="width: 600px;">
        <div class="card-body my-2 mx-2">
          <h2 class="txt-primary">Register Form</h2>
          <form method="POST" action="{{ route('auth.register') }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="mb-3">
              <label for="birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}">
            </div>
            <div class="mb-3 visually-hidden">
              <label for="role" class="form-label">Create as<span class="text-danger">*</span></label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                 Admin
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  User
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
              <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" name="password" value="{{ old('password') }}">
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Password Confirmation<span class="text-danger">*</span></label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
              @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
      </div>
    </div>
@endsection
