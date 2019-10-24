<?php

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

Auth::routes(['register'=>false]);

Route::get('/home', 'EmpresasController@index')->name('home');

//Route::get('/empresas', 'EmpresasController@index');
Route::resource('/empresas', 'EmpresasController')->middleware('auth');
Route::resource('/empleados', 'EmpleadosController')->middleware('auth');

