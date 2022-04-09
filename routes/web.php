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

/*Route::get('/', function () {
    return view('welcome');
});*/

// RUTAS DE CATEGORIAS
Route::get('/','CategoriaController@index');
Route::post('/registrar','CategoriaController@store');
Route::get('/editar/{id}','CategoriaController@edit');
Route::put('/modificar/{id}','CategoriaController@update');
Route::delete('/eliminar/{id}','CategoriaController@destroy');
// RUTAS DE PRODUCTOS
Route::get('/productos','ProductoController@index');
Route::post('/productos/registrar','ProductoController@store');
Route::get('/productos/editar/{id}','ProductoController@edit');
Route::put('/productos/modificar/{id}','ProductoController@update');
Route::delete('/productos/eliminar/{id}','ProductoController@destroy');