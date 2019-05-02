<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lectivo;
use App\AsignaturaGrado;
use App\Conducta;
use DB;

class ConductaController extends Controller
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
    public function create(Request $request)
    {
        $lectivo = Lectivo::where('estado',0)->first();
        $asignatura = AsignaturaGrado::where('f_grado',$request->grado)->first();
        $estudiantes = DB::table('estudiantes')->join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$asignatura->f_grado)->orderBy('estudiantes.apellido')->get();
        $grado = $asignatura->grado;
        return view('Conductas.create',compact(
            'lectivo',
            'estudiantes',
            'grado'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->f_estudiante)){
            DB::beginTransaction();
            try {
                foreach($request->f_estudiante as $k => $estudiante){
                    $conducta = Conducta::where('f_estudiante',$estudiante)->first();

                    if($conducta == null){
                        //Crear el nuevo registro de conducta
                        $conducta = new Conducta;
                        $conducta->f_estudiante = $estudiante;
                    }

                    $conducta->a11 = $request->a11[$k];
                    $conducta->a12 = $request->a12[$k];
                    $conducta->a13 = $request->a13[$k];

                    $conducta->a21 = $request->a21[$k];
                    $conducta->a22 = $request->a22[$k];
                    $conducta->a23 = $request->a23[$k];

                    $conducta->a31 = $request->a31[$k];
                    $conducta->a32 = $request->a32[$k];
                    $conducta->a33 = $request->a33[$k];

                    $conducta->a41 = $request->a41[$k];
                    $conducta->a42 = $request->a42[$k];
                    $conducta->a43 = $request->a43[$k];

                    $conducta->a51 = $request->a51[$k];
                    $conducta->a52 = $request->a52[$k];
                    $conducta->a53 = $request->a53[$k];

                    $conducta->save();
                }
                DB::commit();
                return redirect('/notas')->with('mensaje', '¡Guardado!');
            } catch (Exception $e) {
                DB::rollback();
                return redirect('/notas')->with('mensaje', '¡Algo salio mal!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
