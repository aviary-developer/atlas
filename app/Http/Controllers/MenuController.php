<?php

namespace App\Http\Controllers;

use App\Menu;
use App\DetalleMenu;
use App\Insumo;
use App\Asistencia;
use App\Stock;
use App\CalendarioMenu;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menus=Menu::orderBy('nombre')->get();
      $calendario=CalendarioMenu::all();
      if(count($calendario)==0){
        $crearDias=CalendarioMenu::crearDias();
        $calendario=CalendarioMenu::all();
      }
      $estado=true;
      return view('Menus.index',compact('menus','estado','calendario'));
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
        $menu = new Menu;
        $menu->nombre=$request->nombre;
        $menu->save();
        foreach ($request->cantidades as $key => $insumosMenu) {
          $detalleMenu= new DetalleMenu;
          $detalleMenu->f_menu=$menu->id;
          $detalleMenu->cantidad=$request->cantidades[$key];
          $detalleMenu->f_insumo=$request->insumos[$key];
          $detalleMenu->save();
        }
          DB::commit();
      }catch(Exception $e){
          DB::rollback();
      }
      return redirect('/menus')->with('msg', '¡Guardado!');
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
    public function cambioDiaMenu(Request $request)
    {
      if($request->menu!=0){
      CalendarioMenu::where('dia',$request->dia)->update(['f_menu'=>$request->menu]);
    }else {
      CalendarioMenu::where('dia',$request->dia)->update(['f_menu'=>null]);
    }
      return $request->menus;
    }
    public function calculadora()
    {
      $fecha=Carbon::today();
      $CualMenu=CalendarioMenu::where('dia',$fecha->dayOfWeek)->first();
      $menu=Menu::where('id',$CualMenu->f_menu)->first();
      $asistencia=Asistencia::where('fecha',$fecha->format('Y-m-d'))->where('estado',1)->count();
      $insumos=DB::table('detalle_menus')->join('insumos','detalle_menus.f_insumo','=','insumos.id')
                                         ->select('insumos.id','insumos.nombre','detalle_menus.cantidad')
                                         ->where('f_menu','=',$menu->id)
                                         ->get();
      foreach ($insumos as $key => $value) {
        $stock[]=Stock::where('f_insumo','=',$value->id)->select('saldo')->orderBy('created_at', 'desc')->limit(1)->get();
      }
      $datos=[$menu->nombre,$asistencia,$insumos,$stock,$fecha->format('Y-m-d')];
      return $datos;
    }
    public function calculadoraConAsistencia($asistenciaDia)
    {
      $fecha=Carbon::today();
      $CualMenu=CalendarioMenu::where('dia',$fecha->dayOfWeek)->first();
      $menu=Menu::where('id',$CualMenu->f_menu)->first();
      $insumos=DB::table('detalle_menus')->join('insumos','detalle_menus.f_insumo','=','insumos.id')
                                         ->select('insumos.id','insumos.nombre','detalle_menus.cantidad')
                                         ->where('f_menu','=',$menu->id)
                                         ->get();
    foreach ($insumos as $key => $value) {
      $stock[]=Stock::where('f_insumo','=',$value->id)->select('saldo')->orderBy('created_at', 'desc')->limit(1)->get();
    }
      $datos=[$menu->nombre,$asistenciaDia,$insumos,$stock,$fecha->format('Y-m-d')];
      return $datos;
    }
}
