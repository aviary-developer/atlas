<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Encargado;
use App\Lectivo;
use App\Grado;
use App\PartidaNacimiento;
use App\TelefonoUsuario;
use DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $estudiantes = Estudiante::where('estado',true)->get();
      return view('Estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $lectivo=Lectivo::where('estado',0)->first();
      $grados=Grado::where('f_lectivo',$lectivo->id)->where('estado',0)->get();
      return view('Estudiantes.create',compact('lectivo','grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      DB::beginTransaction();
        try{
          $estudiante = Estudiante::create($request->all());
          $estudiante->save();
          if($request->actaNacimiento){
            $partida= new PartidaNacimiento;
            $partida->numero=$request->numero;
            $partida->folio=$request->folio;
            $partida->tomo=$request->tomo;
            $partida->libro=$request->libro;
            $partida->f_estudiante=$estudiante->id;
            $partida->save();
          }
          if($request->nombreEncargadoM){
            foreach ($request->nombreEncargadoM as $key => $encargados) {
              $encargado= new Encargado;
              $encargado->nombre=$request->nombreEncargadoM[$key];
              $encargado->apellido=$request->apellidoEncargadoM[$key];
              $encargado->dui=$request->duiEncargadoM[$key];
              $encargado->correo=$request->correoEncargadoM[$key];
              $encargado->direccion=$request->direccionEncargadoM[$key];
              $encargado->telefono=$request->telefonoEncargadoM[$key];
              $encargado->celular=$request->celularEncargadoM[$key];
              $encargado->f_estudiante=$estudiante->id;
              $encargado->save();
            }
          }
          DB::commit();
        }catch(Exception $e){
          DB::rollback();
          return redirect('/estudiantes')->with('mensaje', '¡Algo salio mal!');
        }
        return redirect('/estudiantes')->with('mensaje', '¡Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $estudiante = Estudiante::find($id);
      $partida = PartidaNacimiento::where('f_estudiante',$id)->first();
      //dd($partida);
      return view('Estudiantes.edit',compact('estudiante','partida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
