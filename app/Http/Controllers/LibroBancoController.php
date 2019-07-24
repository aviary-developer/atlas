<?php

namespace App\Http\Controllers;

use App\LibroBanco;
use App\DetalleMenu;
use App\Insumo;
use App\Banco;
use App\Asistencia;
use App\Stock;
use App\CalendarioMenu;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LibroBancoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $bancos=Banco::where('estado',1)->orderBy('nombre')->get();
    if(!$request->banco){
    if(count($bancos)>0){
    $primerBanco=$bancos->first();
    $movimientos=LibroBanco::where('f_banco',$primerBanco->id)->get();
  }else{
    $movimientos=LibroBanco::all();
    $bancos=null;
  }
    $bancoSeleccionado=-1;
    return view('LibroBanco.libroBanco',compact('movimientos','bancos','bancoSeleccionado'));
  }else{
    $bancoSeleccionado=$request->banco;
    $movimientos=LibroBanco::where('f_banco',$request->banco)->get();
    return view('LibroBanco.libroBanco',compact('movimientos','bancos','bancoSeleccionado'));
  }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $insumos=Insumo::where('estado',true)->orderBy('nombre')->get();
      return view('Menus.create',compact('insumos'));
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
      $libroBanco = new LibroBanco;
      $libroBanco->fecha=$request->fechaRegistroLibro;
      $libroBanco->concepto=$request->conceptoRegistroLibro;
      $libroBanco->cheque=$request->chequeRegistroLibro;
      $libroBanco->f_banco=$request->bancoHidden;
      $saldoAnterior=LibroBanco::orderBy('id', 'desc')->first();
      if ($request->tipoMovimientoRegistroLibro==0) {//Egreso
        if(!$saldoAnterior){
          return redirect('/libroBanco')->with('error', 'No hay ingresos aún');
        }else if($saldoAnterior->saldo<$request->cantidadRegistroLibro){
          return redirect('/libroBanco')->with('error', 'Saldo no disponible para el egreso');
        }
        $libroBanco->egreso=$request->cantidadRegistroLibro;
        if(!$saldoAnterior){
          $libroBanco->saldo=0-$request->cantidadRegistroLibro;
        }else{
          $libroBanco->saldo=($saldoAnterior->saldo)-$request->cantidadRegistroLibro;
        }
      }else if($request->tipoMovimientoRegistroLibro==1){
        $libroBanco->ingreso=$request->cantidadRegistroLibro;
        if(!$saldoAnterior){
          $libroBanco->saldo=0+$request->cantidadRegistroLibro;
        }else{
          $libroBanco->saldo=($saldoAnterior->saldo)+$request->cantidadRegistroLibro;
        }
      }
      $libroBanco->save();
        DB::commit();
    }catch(Exception $e){
        DB::rollback();
    }
    return redirect('/libroBanco?banco='.$request->bancoHidden)->with('msg', '¡Guardado!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $detallesMenu=DB::table('detalle_menus as dm')
          ->join('insumos as i', 'dm.f_insumo', '=', 'i.id')
          ->where('dm.f_menu', '=', $id)
          ->select('i.nombre', 'dm.cantidad')
          ->get();
      return $detallesMenu;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function edit(Menu $menu)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Menu $menu)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Menu  $menu
   * @return \Illuminate\Http\Response
   */
  public function destroy(Menu $menu)
  {
      //
  }
}
