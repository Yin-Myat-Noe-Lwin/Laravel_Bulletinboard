<?php

use App\Http\Middleware\AuthRoutes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::middleware(['visitor'])->group(function () {
    Route::get('/register', [RegisterController::class, 'registerForm'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

    Route::get('/login', [SessionController::class, 'loginForm'])->name('login');
    Route::post('/login', [SessionController::class, 'login'])->name('login');

    Route::get('/forgot', [ForgotPasswordController::class, 'forgotForm'])->name('auth.forgot');
    Route::post('/forgot', [ForgotPasswordController::class, 'forgot'])->name('auth.forgot');
    Route::get('reset/{user}-{token}', [ForgotPasswordController::class, 'resetForm'])->name('reset');
    Route::post('/reset', [ForgotPasswordController::class, 'reset'])->name('reset');
});

Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

        Route::middleware(['auth', 'checkUserPermission'])->group(function () {
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
         });

    Route::middleware(['auth', 'changePasswordPermission'])->group(function () {
        Route::get('/users/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.edit-password');
        Route::put('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.update-password');
    });

});

