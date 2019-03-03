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

//Expedints routes

Route::get('/expedientes/nuevo', 'ExpedientController@create')->name('expedients.create');

Route::get('/expedientes', 'ExpedientController@index')->name('expedients.index');

Route::get('/expedientes/{expedient}', 'ExpedientController@show')->name('expedients.show');

Route::post('/expedientes/creado', 'ExpedientController@store');

Route::get('/expedientes/{expedient}/editar', 'ExpedientController@edit')->name('expedients.edit');

Route::put('/expedientes/{expedient}', 'ExpedientController@update');

Route::get('/expedientes/{expedient}/anexar', 'ExpedientController@loadAttachAnnexForm')->name('expedients.annexes');

Route::get('expedientes/anexado/{annex}/{expedient}', 'ExpedientController@attachAnnex');


//Annexes routes

Route::get('/anexos', 'AnnexController@index')->name('annexes.index');

Route::get('/anexos/nuevo', 'AnnexController@create')->name('annexes.create');

Route::get('/anexos/{annex}', 'AnnexController@show')->name('annexes.show');

Route::post('/anexos/creado', 'AnnexController@store');

Route::get('/anexos/{annex}/editar', 'AnnexController@edit')->name('annexes.edit');

Route::put('/anexos/{annex}', 'AnnexController@update');


//Departments routes

Route::get('/departamentos', 'DepartmentController@index')->name('departments.index');

Route::get('/departamentos/{department}', 'DepartmentController@show')->name('departments.show');

Route::post('/departamentos/creado', 'DepartmentController@store');


//Home routes

Route::get('/home', 'HomeController@index')->name('home');
