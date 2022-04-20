<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('peliculas', 'App\Http\Controllers\PeliculasController@index');
Route::get('pelicula/{id}', 'App\Http\Controllers\PeliculasController@show');
Route::post('pelicula', 'App\Http\Controllers\PeliculasController@store');
Route::put('pelicula', 'App\Http\Controllers\PeliculasController@store');
Route::delete('pelicula/{id}', 'App\Http\Controllers\PeliculasController@destroy');
