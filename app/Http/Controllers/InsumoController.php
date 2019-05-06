<?php

namespace App\Http\Controllers;

use App\Insumo;
use App\Stock;
use DB;
use Illuminate\Http\Request;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->estado == null){
          $request->estado = 1;
      }
      $estado = $request->estado;
      $insumos=Insumo::where('estado',$estado)->orderBy('nombre')->get();
      return view('Insumos.index',compact('insumos','estado'));
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
          $insumo = new Insumo;
          $insumo->nombre = $request->nombre;
          $insumo->save();

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
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumo $insumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $insumo = Insumo::find($id);

      DB::beginTransaction();
      try{
          $insumo->nombre = $request->nombre;
          $insumo->save();

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
     * @param  \App\Insumo  $insumo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $insumo = Insumo::findOrFail($id);

      DB::beginTransaction();
      try{
          $insumo->delete();

          DB::commit();
          return 1;
      }catch(Exception $e){
          DB::rollback();
          return 0;
      }
    }
    public function disabled($id){
        $insumo = Insumo::find($id);

        DB::beginTransaction();
        try{
            $insumo->estado = !$insumo->estado;
            $insumo->save();

            DB::commit();
            return 1;
        }catch(Exception $e){

            DB::rollback();
            return 0;
        }
    }
    public function stock(Request $request){
      if($request->estado == null){
          $request->estado = 1;
      }
      $estado = $request->estado;
      $insumos=Insumo::where('estado',$estado)->orderBy('nombre')->get();
      return view('Stock.index',compact('insumos','estado'));
    }
    public function movimientos(Request $request){
      $insumo = Insumo::find($request->id);
      $movimientos=Stock::where('f_insumo',$request->id)->get();
      return view('Stock.movimientos',compact('insumo','movimientos'));
    }
}
