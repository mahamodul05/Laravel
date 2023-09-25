<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register',[HomeController::class,'register']);
Route::post('/login',[HomeController::class,'login']);


Route::middleware('auth.sanctum')->group(function(){
    Route::post('/update',[HomeController::class,'update']);
    Route::post('/search',[HomeController::class,'search']);
    Route::post('/logout',[HomeController::class,'logout']);
});

//Route::put('/update',[HomeController::class,'update']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
