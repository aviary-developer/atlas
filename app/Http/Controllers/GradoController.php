<?php

namespace App\Http\Controllers;

use App\Grado;
use App\User;
use App\AsignaturaGrado;
use DB;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        //
    }

    public function add_asignatura(Request $request){
        $grado = $request->grado;
        $asignatura = $request->asignatura;
        $tipo = $request->tipo;

        DB::beginTransaction();

        try{
            if($tipo == 1){
                //Crear
                $relacion = new AsignaturaGrado;
                $relacion->f_asignatura = $asignatura;
                $relacion->f_grado = $grado;
                $relacion->save();
            }else{
                //Eliminar
                $relacion = AsignaturaGrado::where('f_asignatura',$asignatura)->where('f_grado',$grado)->first();

                $relacion->delete();
            }

            DB::commit();

            $docentes = User::where('estado',true)->orderBy('apellido')->get();

            if($tipo == 1){
                $ids = $relacion->id;
                return compact('ids','docentes');
            }else{
                $ids = -1;
                return compact('ids','docentes');
            }
        }catch(Exception $e){
            DB::rollback();
            return 0;
        }
    }

    public function add_docente(Request $request){
        $docente = $request->docente;
        $id = $request->id;


        DB::beginTransaction();

        try{
            $relacion = AsignaturaGrado::find($id);
            $relacion->f_profesor = $docente;
            $relacion->save();
            DB::commit();

            return 1;
        }catch(Exception $e){

            DB::rollback();
            return 0;
        }
    }
}
