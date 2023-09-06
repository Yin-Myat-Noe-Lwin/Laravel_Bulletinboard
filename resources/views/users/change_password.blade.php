@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="d-flex justify-content-center align-items-center">
    <div class="card my-5"  style="width: 600px;">
      <div class="card-body">
        <h2 class="txt-primary">Edit Password</h2>
        <form method="POST" action="{{ route('users.update-password', $user->id) }}">
            @csrf
            @method('PUT')
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
            <div class="row">
              <div class="col text-end">
              <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary">Cancel</a>
                <button class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
      </div>
    </div>
    </div>
  </div>
@endsection
