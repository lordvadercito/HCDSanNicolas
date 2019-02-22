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
Auth::routes();

Route::get('/expedientes/nuevo', 'ExpedientController@create')->name('expedients.create');

Route::get('/expedientes', 'ExpedientController@index')->name('expedients.index');

Route::post('/expedientes/creado', 'ExpedientController@store');

Route::get('/expedientes/{expedient}/editar', 'ExpedientController@edit')->name('expedients.edit');

Route::put('/expedientes/{expedient}', 'ExpedientController@update');

Route::get('/home', 'HomeController@index')->name('home');
