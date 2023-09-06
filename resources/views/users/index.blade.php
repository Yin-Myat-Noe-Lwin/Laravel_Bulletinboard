@extends('layouts.app')

@section('content')
    <div class="container my-5">
      <div class="d-flex justify-content-center align-items-center">
      <div class="card my-5" style="width: 900px;">
        <div class="card-body py-3">
        <p class="py-1">User Count: <span>{{ count($users) }}</span></p>
          <table id="users-table" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                  <tr>
                      <td>{{$user->id}}</td>
                      <td><a href="{{ route('users.show', $user->id) }}" class="user-name">{{$user->name}}</a></td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->address}}</td>
                      <td>{{$user->role}}</td>
                      <td>
                        <a href="{{ route('users.edit', $user->id) }}"><i class="fa-regular fa-pen-to-square text-secondary "></i></a>
                        @if (auth()->user()->id != $user->id)
                        <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-link text-danger" style="margin-top: -5px;">
                                  <i class="fa-solid fa-trash"></i>
                              </button>
                        </form>
                        @endif
                      </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <div class="text-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary mt-3">Create</a>
          </div>
        </div>
      </div>
      </div>
    </div>
@endsection
