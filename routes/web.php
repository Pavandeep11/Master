<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('users', App\Http\Controllers\UserController::class);

Route::PATCH('add-point/{id}', [ 'as' => 'users.add-point', 'uses' => 'App\Http\Controllers\UserController@addPoint']);
Route::PATCH('decrease-point/{id}', [ 'as' => 'users.decrease-point', 'uses' => 'App\Http\Controllers\UserController@decreasePoint']);