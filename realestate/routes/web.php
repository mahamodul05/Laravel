<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\SystemUserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/registration',[SystemUserController::class, 'registration_view'])->name('registration.view');
Route::post('/registration', [SystemUserController::class, 'register'])->name('user.register');

Route::get('/login', [SystemUserController::class,'login_view'])->name('login.view');
Route::post('/login', [SystemUserController::class,'login'])->name('user.login');

Route::get('/dashboard', [SystemUserController::class,'dashboard_view'])->name('dashboard.view');

