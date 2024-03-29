<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Taskapi;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JWTController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware'=>['jwt']], function ($router) {
    Route::apiResource('tasks',Taskapi::class);
Route::post('logout',[JWTController::class,'logout']);
Route::post('refresh',[JWTController::class,'refresh']);
Route::post('profile',[JWTController::class,'profile']);
});

//protected routes
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/tasks',[Taskapi::class,'index']);
// Route::post('/addtask',[Taskapi::class,'addtask']);

// Route::apiResource('tasks',Taskapi::class);
// Route::post("login",[UserController::class,'index']);
Route::post('login',[JWTController::class,'login']);