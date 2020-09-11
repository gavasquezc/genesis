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
    return view('inicio');
});


Route::get('login', 'AuthController@index');

Route::post('logear', 'AuthController@postLogin'); 

Route::get('registrar', 'AuthController@registro');

Route::post('registroUsu', 'AuthController@RegistraUsuario'); 

Route::get('logout', 'AuthController@logout');

Route::get('publicaciones', 'publicacionesController@inicio');

Route::post('guardaPublicacion', 'publicacionesController@publicacionSave');


Route::get('obtenerpublic/{id_pu}', 'publicacionesController@publicacionDatos');


Route::post('editPublicacion', 'publicacionesController@updatePub');

Route::post('guardaComentario', 'publicacionesController@saveComentario');

Route::get('publicaciones', 'AuthController@dashboard'); 

Route::get('home', 'publicacionesController@inicio');

Route::get('getPublicacion/{id_pub}', 'publicacionesController@pubDatos');

Route::get('eliminarpublication/{idd}',  'publicacionesController@deleteP');














