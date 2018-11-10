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
  Route::get('/usuario/permisos','UserController@permisos');

//Ruta de permisos de docentes
Route::resource('permisos', 'PermisoController');

//Rutas de años lectivos
Route::resource('grados','LectivoController');
Route::post('grados/activar','LectivoController@activar')->name('grados.activar');
Route::post('grado/editar','LectivoController@editar_grado')->name('grado.editar');
Route::post('grado/nuevo','LectivoController@nuevo_grado')->name('grado.nuevo');
Route::get('grado/lista_grados','LectivoController@grado')->name('grado.lista_grados');
Route::get('grado/seccion_siguiente','LectivoController@buscar_seccion')->name('grado.seccion_siguiente');
Route::post('grado/agregar_asignatura','GradoController@add_asignatura')->name('grado.agregar_asignatura');
Route::post('grado/agregar_docente', 'GradoController@add_docente')->name('grado.agregar_docente');

//Routas de asignatura

Route::resource('asignaturas', 'AsignaturaController');
Route::post('asignatura/{id}', 'AsignaturaController@disabled')->name('asignatura.disabled');

//Rutas estudiantes
  Route::resource('estudiantes','EstudianteController');
  Route::match(['get','post'],'/desactivateEstudiante/{id}','EstudianteController@desactivate');
  Route::match(['get','post'],'/activateEstudiante/{id}','EstudianteController@activate');
  Route::match(['get','post'],'/destroyEstudiante/{id}','EstudianteController@destroy');
