@extends('layouts.app')

@section('content')
    <div class="container my-5">
      <div class="d-flex justify-content-center align-items-center">
      <div class="card my-5" style="width: 600px;">
        <div class="card-body">
          <h2 class="txt-primary">Edit User</h2>
          <form method="POST" action="{{ route('users.update',$user->id) }}" >
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
            </div>
            <div class="mb-3">
              <label for="birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}">
            </div>
            <div class="mb-3 visually-hidden">
              <label for="role" class="form-label">Create as</label>
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

