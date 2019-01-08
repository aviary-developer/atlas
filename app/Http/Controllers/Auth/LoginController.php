<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
  public function __construct(){
    $this->middleware('guest',['only'=>'showLoginForm']);
  }
  public function showLoginForm(){
    return view('auth.login');
  }
  public function login()
  {
    $credentials= $this->validate(request(),[
      'name' => 'required|string',
      'password' => 'required|string'
    ]);
    if (Auth::attempt($credentials)) {
      return redirect()->route('inicio');
    }else{
      return back()->withErrors(['name'=>'Estas credenciales no coinciden con nuestros registros'])
      ->withInput(request(['name']));
    }
  }
  public function logout(){
    Auth::logout();
    return redirect('/');
  }
}
