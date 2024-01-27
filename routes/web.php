<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/admin/user-list', [\App\Http\Controllers\ViewController::class, 'user']);
Route::get('/admin/user/detail/{id}', [\App\Http\Controllers\ViewController::class, 'showUser']);
Route::get('/admin/pickup-list', [\App\Http\Controllers\ViewController::class, 'pickup']);
Route::get('/admin/home', [\App\Http\Controllers\ViewController::class, 'home']);
Route::get('/admin/pickup/detail/{id}', [\App\Http\Controllers\ViewController::class, 'showPickup']);
Route::get('/admin/pickup/edit/{id}', [\App\Http\Controllers\ViewController::class, 'edit']);
Route::get('/admin/pickup/update/{id}', [\App\Http\Controllers\ViewController::class, 'update']);
