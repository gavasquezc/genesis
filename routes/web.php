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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home');
});

Route::get('publicaciones', 'publicacionesController@inicio');

Route::post('guardaPublicacion', 'publicacionesController@publicacionSave');


Route::get('obtenerpublic/{id_pu}', 'publicacionesController@publicacionDatos');


Route::post('editPublicacion', 'publicacionesController@updatePub');