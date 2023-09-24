<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;


////////////// login logout - start /////////////
Route::controller(AuthController::class)->group(function() {
  Route::get('/', 'login')->name('login.form');
  Route::post('/login-auth', 'loginAuth')->name('login.auth');
  Route::get('/logout', 'logout')->name('logout');
});
////////////// login logout - end //////////////


////////////////////////// Google Login Auth - start //////////////////////////
Route::controller(GoogleAuthController::class)->group(function()
{
  Route::get('/auth/google', 'redirect')->name('google-auth');
  Route::get('/auth/google/call-back', 'callbackGoogle');
  Route::get('/dashboard', 'dashboard')->name('dashboard');
});
////////////////////////// Google Login Auth - end //////////////////////////


//////////// auth middleware - start ////////////
Route::middleware('custom_auth')->group(function() {
  Route::get('/dashboard2', [AuthController::class, 'dashboard2'])->name('dashboard2');
});
//////////// auth middleware - end ////////////
