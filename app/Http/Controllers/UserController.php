<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TelefonoUsuario;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('estado',true)->orderBy('apellido','asc')->get();
        return view('Usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios=User::all();
        $cantidadUsuarios=User::count();
        if ($cantidadUsuarios>0) {
        $id=(int)$usuarios->last()->id;
      }else {
        $id=0;
      }
        $nuevoId=$id+1;
        return view('Usuarios.create',compact('nuevoId'));
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
          $request['password']=bcrypt($request['password']);
          $user = User::create($request->All());
          $user->save();
          if (isset($request->telefono)) {
            foreach ($request->telefono as $k => $val) {
              $telefono_usuario = new TelefonoUsuario;
              $telefono_usuario->f_usuario = $user->id;
              $telefono_usuario->telefono = $request->telefono[$k];
              $telefono_usuario->save();
            }
          }
          DB::commit();
        }catch(Exception $e){
          DB::rollback();
          return redirect('/usuarios')->with('mensaje', '¡Algo salio mal!');
        }
        return redirect('/usuarios')->with('mensaje', '¡Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $usuario = User::find($id);
      $telefonos = TelefonoUsuario::where('f_usuario',$id)->get();
      return view('Usuarios.show',compact(
        'usuario',
        'telefonos'
      ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $usuario = User::find($id);
      $telefonos_usuarios = TelefonoUsuario::where('f_usuario',$id)->get();
      $passwordDefault='ENA'.str_pad($usuario->id,4,"0",STR_PAD_LEFT);
      $password=0;
      if (Hash::check($passwordDefault, $usuario->password)) {
        $password=1;
      }
      return view('Usuarios.edit',compact('usuario','telefonos_usuarios','password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      DB::beginTransaction();
      try{
      $usuario = User::find($id);
      $usuario->fill($request->all());
      if($request->nuevaContra){
        $usuario->password=bcrypt($request->nuevaContra);
      }
      if (isset($request->telefono)) {
        $telefonosAntiguos=TelefonoUsuario::where('f_usuario',$usuario->id)->delete();
        foreach ($request->telefono as $k => $val) {
          $telefono_usuario = new TelefonoUsuario;
          $telefono_usuario->f_usuario = $usuario->id;
          $telefono_usuario->telefono = $request->telefono[$k];
          $telefono_usuario->save();
        }
      }
      $usuario->save();
      DB::commit();
          }catch(Exception $e){
            DB::rollback();
            return redirect('/usuarios')->with('mensaje', '¡Algo salio mal!');
          }
          return redirect('/usuarios')->with('mensaje', '¡Guardado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $usuario = User::findOrFail($id);
      $telefonos = TelefonoUsuario::where('f_usuario',$id)->get();
      foreach($telefonos as $telefono){
      $telefono->delete();
    }
    $usuario->estado=false;
    $usuario->save();
    return redirect('/usuarios')->with('mensaje', '¡Eliminado!');
    }

    public function permisos(Request $request){
        $usuarios = User::where('estado',true)->orderBy('apellido','asc')->get();
        return view('Usuarios.permisos_index',compact('usuarios'));
    }
}
