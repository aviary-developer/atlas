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
//Rutas usuarios
  Route::resource('usuarios','UserController');
  Route::match(['get','post'],'/desactivateUsuario/{id}','UserController@desactivate');
  Route::match(['get','post'],'/activateUsuario/{id}','UserController@activate');
  Route::match(['get','post'],'/destroyUsuario/{id}','UserController@destroy');

//Rutas de años lectivos
Route::resource('grados','LectivoController');
Route::post('grados/activar','LectivoController@activar')->name('grados.activar');
Route::post('grado/editar','LectivoController@editar_grado')->name('grado.editar');
Route::post('grado/nuevo','LectivoController@nuevo_grado')->name('grado.nuevo');
Route::get('grado/lista_grados','LectivoController@grado')->name('grado.lista_grados');
Route::get('grado/seccion_siguiente','LectivoController@buscar_seccion')->name('grado.seccion_siguiente');

//Routas de asignatura

Route::resource('asignaturas', 'AsignaturaController');
Route::post('asignatura/{id}', 'AsignaturaController@disabled')->name('asignatura.disabled');

