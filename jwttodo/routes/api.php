<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SAdminController;


Route::post('/register',[HomeController::class,'register']);
Route::post('/login',[HomeController::class,'login']);

Route::group(['prefix'=>'user'], function(){
    Route::put('update',[UserController::class,'update_user']);
    Route::get('showtodo',[UserController::class,'show_todo']);
    Route::post('logout',[UserController::class,'logout']);
});

Route::group(['prefix'=>'admin'], function(){
    Route::post('/createtodo',[AdminController::class,'create_todo']);
    Route::get('showtodo',[AdminController::class,'show_todo']);
    Route::put('/updateuser',[AdminController::class,'update_user']);
    Route::post('/searchuser',[AdminController::class,'search_user']);
    Route::post('/logout',[AdminController::class,'logout']);
});

Route::group(['prefix'=>'superadmin'], function(){
    Route::post('/createtodo',[SAdminController::class,'create_todo']);
    Route::get('showtodo',[SAdminController::class,'show_todo']);
    Route::put('/updateadmin',[SAdminController::class,'update_admin']);
    Route::put('/updateuser',[SAdminController::class,'update_user']);
    Route::post('/searchadmin',[SAdminController::class,'search_admin']);
    Route::post('/searchuser',[SAdminController::class,'search_user']);
    Route::post('/logout',[SAdminController::class,'logout']);
});









/*
Route::middleware('auth.sanctum')->group(function(){
    //User
});

Route::middleware('auth.sanctum')->group(function(){
    //Admin
});

Route::middleware('auth.sanctum')->group(function(){
    //SuperAdmin
});
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
