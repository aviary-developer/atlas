<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleTransaccion;
use App\Insumo;
use App\Transaccion;
use DB;
use DateTime;
use Carbon\Carbon;

class TransaccionController extends Controller
{
  public function index(){
    $transacciones=Transaccion::orderBy('created_at')->get();
    $estado=true;
    return view('Transacciones.index',compact('transacciones','estado'));
  }
  public function create(){
    $insumos=Insumo::where('estado',true)->orderBy('nombre')->get();
    return view('Transacciones.create',compact('insumos'));
  }
  public function guardarTransaccion(Request $request){
    DB::beginTransaction();
    try{
      $transaccion = new Transaccion;
      $transaccion->fecha=new Carbon($request->fechaIngreso);
      $transaccion->save();
      foreach ($request->cantidades as $key => $entradaInsumo) {
        $detalleTransaccion= new DetalleTransaccion;
        $detalleTransaccion->f_transaccion=$transaccion->id;
        $detalleTransaccion->cantidad=$request->cantidades[$key];
        $detalleTransaccion->f_insumo=$request->insumos[$key];
        $detalleTransaccion->save();
      }
        DB::commit();
    }catch(Exception $e){
        DB::rollback();
    }
    return redirect('/transacciones')->with('msg', '¡Guardado!');
  }
  public function show($id)
  {
    $transaccion=Transaccion::find($id);
    $detalles=DetalleTransaccion::where('f_transaccion',$id)->get();
      return view('Transacciones.show',compact('detalles','transaccion'));
  }
}
