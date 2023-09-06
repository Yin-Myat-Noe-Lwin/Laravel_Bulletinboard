@extends('layouts.app')

@section('content')
    <div class="container my-5">
      <div class="d-flex justify-content-center align-items-center">
        <div class="card my-5" style="width: 600px;">
          <div class="card-body p-4">
            <h2 class="txt-primary">Profile</h2>
            <div class="row">
              <div class="col-12 col-md-6">
                <p>Name</p>
              </div>
              <div class="col-12 col-md-6">
                <p>{{$user->name}}</p>
              </div>
              <div class="col-12 col-md-6">
                <p>Email</p>
              </div>
              <div class="col-12 col-md-6">
                <p>{{$user->email}}</p>
              </div>
              @if (auth()->user()->id === $user->id)
                <div class="col-12 col-md-6">
                  <p>Password</p>
                </div>
                <div class="col-12 col-md-6">
                  <p><a href="{{ route('users.edit-password', $user->id) }}" class="btn change-psw-btn">Change</a></p>
                </div>
              @endif
              <div class="col-12 col-md-6">
                <p>Phone</p>
              </div>
              <div class="col-12 col-md-6">
                <p>{{$user->phone}}</p>
              </div>
              <div class="col-12 col-md-6">
                <p>Address</p>
              </div>
              <div class="col-12 col-md-6">
                <p>{{$user->address}}</p>
              </div>
              <div class="col-12 col-md-6">
                <p>Birthday</p>
              </div>
              <div class="col-12 col-md-6">
                <p>{{$user->birthday}}</p>
              </div>
              <div class="col-12 col-md-6">
                <p>Role</p>
              </div>
              <div class="col-12 col-md-6">
                <p>{{$user->role}}</p>
              </div>
            </div>
            <div class="text-end">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary text-end">Edit</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
