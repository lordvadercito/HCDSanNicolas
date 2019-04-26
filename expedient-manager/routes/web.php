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

//Expedients routes

Route::get('/expedientes/nuevo', 'ExpedientController@create')->name('expedients.create');

Route::get('/expedientes', 'ExpedientController@index')->name('expedients.index');

Route::get('/expedientes/{expedient}', 'ExpedientController@show')->name('expedients.show');

Route::post('/expedientes/creado', 'ExpedientController@store');

Route::get('/expedientes/{expedient}/editar', 'ExpedientController@edit')->name('expedients.edit');

Route::put('/expedientes/{expedient}', 'ExpedientController@update');

Route::get('/expedientes/{expedient}/anexar', 'ExpedientController@loadAttachAnnexForm')->name('expedients.annexes');

Route::get('/expedientes/anexado/{annex}/{expedient}', 'ExpedientController@attachAnnex');

Route::get('/expedientes/desvincular/{annex}/{expedient}', 'ExpedientController@detachAnnex');


//Movements routes

Route::get('/movimientos', 'MovementController@index')->name('movements.index');

Route::get('/movimientos/{expedient}/nuevo', 'MovementController@create')->name('movements.create');

Route::get('/movimientos/{movement}', 'MovementController@show')->name('movements.show');

Route::post('/movimientos/creado', 'MovementController@store');


//Councillor routes

Route::get('/concejales', 'CouncillorController@index')->name('councillors.index');

Route::get('/concejales/nuevo', 'CouncillorController@create')->name('councillors.create');

Route::get('/concejales/{councillor}', 'CouncillorController@show')->name('councillors.show');

Route::post('/concejales/creado', 'CouncillorController@store');

Route::get('/concejales/{councillor}/editar', 'CouncillorController@edit')->name('councillors.edit');

Route::put('/concejales/{councillor}', 'CouncillorController@update');


//Blocks routes

Route::get('/bloques', 'BlockController@index')->name('blocks.index');

Route::get('/bloques/nuevo', 'BlockController@create')->name('blocks.create');

Route::get('/bloques/{block}', 'BlockController@show')->name('blocks.show');

Route::post('/bloques/creado', 'BlockController@store');

Route::get('/bloques/{block}/editar', 'BlockController@edit')->name('blocks.edit');

Route::put('/bloques/{block}', 'BlockController@update');


//Commissions routes

Route::get('/comisiones', 'CommissionController@index')->name('commissions.index');

Route::get('/comisiones/nuevo', 'CommissionController@create')->name('commissions.create');

Route::get('/comisiones/{commission}', 'CommissionController@show')->name('commissions.show');

Route::post('/comisiones/creado', 'CommissionController@store');

Route::get('/comisiones/{commission}/editar', 'CommissionController@edit')->name('commissions.edit');

Route::put('/comisiones/{commission}', 'CommissionController@update');


//Notes routes

Route::get('/notas', 'NoteController@index')->name('notes.index');

Route::get('/notas/nuevo', 'NoteController@create')->name('notes.create');

Route::get('/notas/{note}', 'NoteController@show')->name('notes.show');

Route::post('/notas/creado', 'NoteController@store');

Route::get('/notas/{note}/editar', 'NoteController@edit')->name('notes.edit');

Route::put('/notas/{note}', 'NoteCOntroller@update');


//Authority routes (Edit only)

Route::get('/autoridades', 'AuthorityController@edit')->name('authorities.edit');

Route::put('/autoridades/{authority}', 'AuthorityController@update');


//Act routes

Route::get('/actas', 'ActController@index')->name('acts.index');

Route::get('/actas/nueva', 'ActController@create')->name('acts.create');

Route::post('/actas/creada', 'ActController@store');

Route::get('/actas/{act}', 'ActController@show')->name('acts.show');

Route::get('/actas/{act}/editar', 'ActController@edit')->name('acts.edit');

Route::put('/actas/{act}', 'ActController@update');

//Home routes

Route::get('/home', 'HomeController@index')->name('home');
