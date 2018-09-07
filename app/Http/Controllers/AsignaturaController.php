<?php

namespace App\Http\Controllers;

use App\Asignatura;
use DB;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Crear las asignaturas por defecto del sistema
        Asignatura::create_asignaturas();

        if($request->estado == null){
            $request->estado = 1;
        }
        $estado = $request->estado;

        $asignaturas = Asignatura::where('estado',$estado)->get();

        return view('Asignaturas.index',compact(
            'asignaturas',
            'estado'
        ));
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
        DB::beginTransaction();
        try{
            $asignatura = new Asignatura;
            $asignatura->nombre = $request->nombre;
            $asignatura->save();

            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return 0;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);

        DB::beginTransaction();
        try{
            $asignatura->nombre = $request->nombre;
            $asignatura->save();

            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignatura = Asignatura::findOrFail($id);

        DB::beginTransaction();
        try{
            $asignatura->delete();

            DB::commit();
            return 1;
        }catch(Exception $e){
            DB::rollback();
            return 0;
        }
    }

    public function disabled($id){
        $asignatura = Asignatura::find($id);

        DB::beginTransaction();
        try{
            $asignatura->estado = !$asignatura->estado;
            $asignatura->save();

            DB::commit();
            return 1;
        }catch(Exception $e){

            DB::rollback();
            return 0;
        }
    }
}
