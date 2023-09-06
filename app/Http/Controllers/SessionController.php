<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return view('auth.login',['error' => 'Invalid email or password']);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
