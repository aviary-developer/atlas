<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Banco;

class BancosController extends Controller
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
    $bancos=Banco::where('estado',$estado)->orderBy('nombre')->get();
    return view('Bancos.index',compact('bancos','estado'));
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
        $banco = new Banco;
        $banco->nombre = $request->nombre;
        $banco->save();

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
   * @param  \App\Banco  $banco
   * @return \Illuminate\Http\Response
   */
  public function show(Banco $banco)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Banco  $banco
   * @return \Illuminate\Http\Response
   */
  public function edit(Banco $banco)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Banco  $banco
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $banco = Banco::find($id);

    DB::beginTransaction();
    try{
        $banco->nombre = $request->nombre;
        $banco->save();

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
   * @param  \App\Banco  $banco
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $banco = Banco::findOrFail($id);

    DB::beginTransaction();
    try{
        $banco->delete();

        DB::commit();
        return 1;
    }catch(Exception $e){
        DB::rollback();
        return 0;
    }
  }
  public function disabled($id){
      $banco = Banco::find($id);

      DB::beginTransaction();
      try{
          $banco->estado = !$banco->estado;
          $banco->save();

          DB::commit();
          return 1;
      }catch(Exception $e){

          DB::rollback();
          return 0;
      }
  }
}
