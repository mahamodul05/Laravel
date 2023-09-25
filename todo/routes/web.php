<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirects',[HomeController::class,'index']);


Route::get('/admin/dashboard',[AdminController::class,'home'])->name('admin.dashboard');
Route::get('/admin/todolist',[AdminController::class,'todoshow'])->name('todo.admin.show');


Route::get('/superadmin',[SuperAdminController::class,'home'])->name('superadmin.dashboard');
Route::get('/superadmin/todolist',[SuperAdminController::class,'todoshow'])->name('todo.superadmin.show');


Route::get('/user',[UserController::class,'home'])->name('user.dashboard');
Route::get('/user/todolist',[AdminController::class,'todoshow'])->name('todo.user.show');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
