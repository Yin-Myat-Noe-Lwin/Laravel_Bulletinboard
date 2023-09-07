<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                // return $isUser;
                return redirect()->intended(RouteServiceProvider::HOME);
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('password')
                ]);

                Auth::login($createUser);
                // return $createUser;
                return redirect()->intended(RouteServiceProvider::HOME);
            }

        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
