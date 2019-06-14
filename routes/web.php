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

Route::get('/','Auth\LoginController@showLoginForm'); //El middleware esta en el Controller

Route::get('/inicio','InicioController@inicio')->name('inicio');

Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');
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
Route::get('grado/turno','LectivoController@turno')->name('grado.turno');
Route::post('grado/matricula', 'LectivoController@matricula')->name('grado.matricula');
Route::post('grado/estado', 'LectivoController@estado_estudiante')->name('grado.estado');

//Routas de asignatura

Route::resource('asignaturas', 'AsignaturaController');
Route::post('asignatura/{id}', 'AsignaturaController@disabled')->name('asignatura.disabled');

//Rutas estudiantes
  Route::resource('estudiantes','EstudianteController');
  Route::match(['get','post'],'/desactivateEstudiante/{id}','EstudianteController@desactivate');
  Route::match(['get','post'],'/activateEstudiante/{id}','EstudianteController@activate');
  Route::match(['get','post'],'/destroyEstudiante/{id}','EstudianteController@destroy');
  Route::get('/estudiante/buscar_pariente','EstudianteController@buscar_pariente')->name('estudiante.buscar_pariente');

  Route::get('/estudiante/buscar_estudiante', 'NotaController@buscar_estudiante')->name('estudiante.buscar_estudiante');

  Route::get('/grado/lista_estudiante','GradoController@lista')->name('grado.lista_estudiante');
  Route::get('/grado/notas','GradoController@notas')->name('grado.notas');
  Route::get('/grado/cuadro_final','GradoController@cuadro_final')->name('grado.cuadro_final');


  //Rutas parientes
  Route::resource('parientes', 'ParienteController');
  Route::get('pariente/datos','ParienteController@get_pariente');
  Route::post('pariente/delete','EstudianteController@delete_parentesco');

//Rutas notas
Route::resource('notas', 'NotaController');

Route::resource('conductas', 'ConductaController');

Route::resource('insumos', 'InsumoController');
Route::post('insumo/{id}', 'InsumoController@disabled')->name('insumo.disabled');
Route::get('insumo/stock','InsumoController@stock')->name('insumo.stock');
Route::get('insumo/movimientos/{id}','InsumoController@movimientos')->name('insumo.movimientos');
Route::resource('asistencia', 'AsistenciaController');
Route::get('asistencia/verEstudiantes/{grado}/{fecha}','AsistenciaController@verEstudiantes')->name('asistencia.verEstudiantes');
Route::post('asistencia/guardarAsistencia','AsistenciaController@guardarAsistencia')->name('asistencia.guardarAsistencia');

Route::resource('transacciones', 'TransaccionController');
Route::post('transacciones/guardarTransaccion','TransaccionController@guardarTransaccion');

Route::resource('salidas', 'SalidaController');
Route::post('salidas/guardarSalida','SalidaController@guardarSalida');

Route::resource('menus', 'MenuController');
Route::post('cambioDiaMenu', 'MenuController@cambioDiaMenu')->name('menu.cambio');
Route::get('calculadora', 'MenuController@calculadora')->name('menu.calculadora');
Route::get('calculadoraConAsistencia/{asistencia}', 'MenuController@calculadoraConAsistencia')->name('menu.calculadoraConAsistencia');
//Route::get('menus/show/{menu}','MenuController@show')->name('menu.show');

Route::get('/estudiante/asistencia','AsistenciaController@grafica_estudiante')->name('estudiante.asistencia');
Route::post('/nota/promedios','LectivoController@promedio_notas')->name('nota.promedios');

//Ruta de validación
Route::get('/validate',function(Illuminate\Http\Request $request){
  $tabla = $request->tabla;
  $campo = $request->campo;
  $valor = $request->valor;

  $cantidad = DB::table($tabla)->where($campo, $valor)->count();

  return (json_encode($cantidad));
});
