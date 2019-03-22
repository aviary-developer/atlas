<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignaturaGrado;
use App\Lectivo;
use App\Matricula;
use App\Grado;
use App\User;
use App\Nota;
use DB;
use Auth;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docente = User::find(Auth::user()->id);
        //Obtener el año lectivo
        $lectivo = Lectivo::where('estado',0)->first();
        //Obtener todos los grados en los que el docente es asesor
        $grados_asesorados = Grado::where('f_profesor', $docente->id)->where('f_lectivo',$lectivo->id)->orderBy('numero')->get();
        $asignaturas_asignadas = $lectivo->asignaturas_asignadas;
        $auxiliar = [];
        foreach($asignaturas_asignadas as $k => $asignaturas){
            $auxiliar[$k] = $asignaturas->grado;
        }
        $unico = array_unique($auxiliar);
        $unico = collect($unico);
        $grados_prev = $grados_asesorados->concat($unico);
        $aux2 = [];
        foreach($grados_prev as $k => $grados){
            $aux2[$k] = $grados;
        }
        $grados = array_unique($aux2);
        $grados = collect($grados);
        $grados = $grados->sortBy('numero');

        return view('Notas.index',compact(
            'grados',
            'lectivo',
            'docente'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_asignatura = $request->asignatura;
        $asignatura = AsignaturaGrado::find($id_asignatura);
        $lectivo = Lectivo::where('estado',0)->first();
        $estudiantes = DB::table('estudiantes')->join('matriculas','estudiantes.id','matriculas.f_estudiante')->where('matriculas.f_grado',$asignatura->f_grado)->orderBy('estudiantes.apellido')->get();
        return view('Notas.create',compact(
            'lectivo',
            'asignatura',
            'estudiantes'
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
                    $nota = Nota::where('f_estudiante',$estudiante)->where('f_asignatura',$request->id_a)->first();

                    if($nota == null){
                        //Crear el registro
                        $nota = new Nota;
                        $nota->f_estudiante = $estudiante;
                        $nota->f_asignatura = $request->id_a;
                    }

                    $nota->n1p1 = $request->n1p1[$k];
                    $nota->n2p1 = $request->n2p1[$k];
                    $nota->n3p1 = $request->n3p1[$k];
                    $nota->n1p2 = $request->n1p2[$k];
                    $nota->n2p2 = $request->n2p2[$k];
                    $nota->n3p2 = $request->n3p2[$k];
                    $nota->n1p3 = $request->n1p3[$k];
                    $nota->n2p3 = $request->n2p3[$k];
                    $nota->n3p3 = $request->n3p3[$k];
                    $nota->save();
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

    public function buscar_estudiante(Request $request){
        $lectivo = Lectivo::where('estado',0)->first();
        $valor = $request->valor;
        $valor = trim($valor);

        $estudiantes = DB::table('estudiantes')
        ->whereNotExists(
            function ($query) use ($lectivo){
                $query->select(DB::raw(1))
                ->from('matriculas')
                ->join('grados','matriculas.f_grado','grados.id')
                ->where('grados.f_lectivo',$lectivo->id)
                ->whereRaw('estudiantes.id = matriculas.f_estudiante');
            }
        )->where(
            function ($query) use ($valor){
                $query->where('nombre','like','%'.$valor.'%')
                ->orWhere('apellido','like','%'.$valor.'%')
                ->orWhere('nie','like','%'.$valor.'%');
            }
        )->where('estado',1)->orderBy('apellido')->take(5)->get(['id','nombre','apellido','nie','sexo','fechaNacimiento']);


        return $estudiantes;
    }
}
