<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\Lectivo;
use Illuminate\Http\Request;
use DB;

class PermisoController extends Controller
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

        DB::beginTransaction();

        try{
            $permiso = new Permiso;
            $permiso->fecha_inicio = $request->fecha_inicio;
            $permiso->fecha_final = $request->fecha_final;
            $permiso->horas = $request->horas;
            $permiso->categoria = $request->categoria;
            $permiso->f_profesor = $request->f_profesor;
            $permiso->f_lectivo = Lectivo::activo();
            $permiso->save();

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
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show(Permiso $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function edit(Permiso $permiso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permiso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permiso $permiso)
    {
        //
    }
}
