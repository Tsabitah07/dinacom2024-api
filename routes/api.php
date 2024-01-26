<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::get('/data-user', [\App\Http\Controllers\API\AuthController::class, 'user'])->middleware('auth:sanctum');
Route::get('/list-user', [\App\Http\Controllers\API\AuthController::class, 'show']);

Route::post('/pickup/store', [\App\Http\Controllers\API\PickupController::class, 'store'])->middleware('auth:sanctum');
Route::get('/pickup/data', [\App\Http\Controllers\API\PickupController::class, 'index'])->middleware('auth:sanctum');
Route::get('/pickup/data-user/{user_id}', [\App\Http\Controllers\API\PickupController::class, 'getByUser'])->middleware('auth:sanctum');
Route::post('/pickup/update/{id}', [\App\Http\Controllers\API\PickupController::class, 'update'])->middleware('auth:sanctum');
