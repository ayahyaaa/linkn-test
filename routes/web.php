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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {

    Route::get('/links', 'App\Http\Controllers\LinkController@index');
    Route::get('/links/new', 'App\Http\Controllers\LinkController@create');
    Route::post('/links/new', 'App\Http\Controllers\LinkController@store');
    Route::get('/links/{link}', 'App\Http\Controllers\LinkController@edit');
    Route::post('/links/{link}', 'App\Http\Controllers\LinkController@update');
    Route::delete('/links/{link}', 'App\Http\Controllers\LinkController@destroy');

    Route::get('/settings', 'App\Http\Controllers\UserController@edit');
    Route::post('/settings', 'App\Http\Controllers\UserController@update');

});

// Google login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::post('/visit/{link}', 'App\Http\Controllers\VisitController@store');

Route::get('/{user}', 'App\Http\Controllers\UserController@show');
