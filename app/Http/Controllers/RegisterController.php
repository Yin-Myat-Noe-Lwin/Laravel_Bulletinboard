<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;

class RegisterController extends Controller
{
    public function registerForm() {
        return view('auth.register');
    }

    public function register(UserCreateRequest $request)
    {
        $user = User::create($request->all());

        return redirect()->route('users.index');

    }

}
