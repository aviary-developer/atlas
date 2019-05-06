<?php

namespace App\Http\Controllers;

use App\Salida;
use DB;
use DateTime;
use Carbon\Carbon;
use App\DetalleSalida;
use App\Stock;
use App\Insumo;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $salidas=Salida::orderBy('created_at')->get();
      $estado=true;
      return view('Salidas.index',compact('salidas','estado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $insumos=Insumo::where('estado',true)->orderBy('nombre')->get();
      return view('Salidas.create',compact('insumos'));
    }
    public function guardarSalida(Request $request){
      DB::beginTransaction();
      try{
        $salida = new Salida;
        $salida->fecha=new Carbon($request->fechaIngreso);
        $salida->save();
        foreach ($request->cantidades as $key => $entradaInsumo) {
          $detalleSalida= new DetalleSalida;
          $detalleSalida->f_salida=$salida->id;
          $detalleSalida->cantidad=$request->cantidades[$key];
          $detalleSalida->f_insumo=$request->insumos[$key];
          $movimientosEnStock= Stock::where('f_insumo',$request->insumos[$key])->get();
          if(!$movimientosEnStock->last()){
            return redirect('/salidas')->with('error', '¡No guardado!');
          }else{
            $saldoAGuardar=$movimientosEnStock->last()->saldo-$request->cantidades[$key];
          }
          $movimientoStock=new Stock;
          $movimientoStock->tipoMovimiento=1;
          $movimientoStock->f_insumo=$request->insumos[$key];
          $movimientoStock->cantidad=$request->cantidades[$key];
          $movimientoStock->saldo=$saldoAGuardar;
          $movimientoStock->fecha=new Carbon($request->fechaIngreso);
          $movimientoStock->save();
          $detalleSalida->save();
        }
          DB::commit();
      }catch(Exception $e){
          DB::rollback();
      }
      return redirect('/salidas')->with('msg', '¡Guardado!');
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
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $salida=Salida::find($id);
      $detalles=DetalleSalida::where('f_salida',$id)->get();
        return view('Salidas.show',compact('detalles','salida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        //
    }
}
