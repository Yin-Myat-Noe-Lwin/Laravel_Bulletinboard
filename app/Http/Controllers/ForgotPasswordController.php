<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function forgotForm() {
        return view('auth.forgot');
    }

    public function forgot(ForgotPasswordRequest $request) {

        $user = User::where('email', $request->email)->first();

        $token = Str::random(64);

        $expiresAt = Carbon::now()->addMinute();

        $passwordReset = new PasswordReset();
        $passwordReset->email = $request->email;
        $passwordReset->token = $token;
        $passwordReset->created_at = Carbon::now();
        $passwordReset->expires_at = $expiresAt;
        $passwordReset->save();

        Mail::send('email.forgotPassword', ['user' => $user->id, 'token' => $token] , function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('login');
    }

    public function resetForm($user, $token) {

        $user = User::find($user);

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found');
        }

        $passwordReset = PasswordReset::where('email', $user->email)
                                        ->where('token', $token)
                                        ->where('expires_at', '>=', Carbon::now())
                                        ->first();

        if (!$passwordReset) {
            return view('auth.login',['error' => 'Invalid reset token']);
        }

        return view('auth.reset', compact('token', 'user'));
    }

    public function reset(ResetPasswordRequest $request) {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return view('auth.login',['error' => 'User not found']);
        }

        $passwordReset = PasswordReset::where('email', $request->email)
                                        ->where('token', $request->token)
                                        ->first();

        if (!$passwordReset || $passwordReset->expires_at < now()) {
            return view('auth.login',['error' => 'Invalid reset token']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $passwordReset->delete();

        return redirect()->route('login' , ['success' => 'Password Reset Successfully']);
        // $updatePassword = DB::table('password_resets')
        //                       ->where([
        //                         'email' => $request->email,
        //                         'token' => $request->token
        //                       ])
        //                       ->first();

        //   if(!$updatePassword){
        //       return back()->withInput()->with('error', 'Invalid token!');
        //   }

        //   $user = User::where('email', $request->email)
        //               ->update(['password' => Hash::make($request->password)]);

        //   DB::table('password_resets')->where(['email'=> $request->email])->delete();

        //   return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
