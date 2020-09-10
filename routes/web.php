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

Route::get('/','UserController@index');

//Ruta que me permite guardar a los usuarios
//Store sirve para guardar en la base de datos
// ->name()= es para darle un nombre y podamos setearle en nuestras vistas
Route::post('/users','UserController@store')->name('users.store');

//eliminar registros
Route::delete('/users/{user}','UserController@destroy')->name('users.destroy');

//prueba de blade:
//Por ejemplo si quiero hacer páginas estáticas
Route::get('/prueba', function(){

    return view('pruebavista.home');
});
