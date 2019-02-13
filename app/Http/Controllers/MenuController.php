<?php

namespace App\Http\Controllers;

use App\Menu;
use App\DetalleMenu;
use App\Insumo;
use App\CalendarioMenu;
use DB;
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
    public function show(Menu $menu)
    {
        //
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
}
