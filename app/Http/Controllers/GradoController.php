<?php

namespace App\Http\Controllers;

use App\Grado;
use App\User;
use App\AsignaturaGrado;
use App\Estudiante;
use App\Asignatura;
use App\Lectivo;
use DB;
use Illuminate\Http\Request;

class GradoController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        //
    }

    public function add_asignatura(Request $request){
        $grado = $request->grado;
        $asignatura = $request->asignatura;
        $tipo = $request->tipo;

        DB::beginTransaction();

        try{
            if($tipo == 1){
                //Crear
                $relacion = new AsignaturaGrado;
                $relacion->f_asignatura = $asignatura;
                $relacion->f_grado = $grado;
                $relacion->save();
            }else{
                //Eliminar
                $relacion = AsignaturaGrado::where('f_asignatura',$asignatura)->where('f_grado',$grado)->first();

                $relacion->delete();
            }

            DB::commit();

            $docentes = User::where('estado',true)->orderBy('apellido')->get();

            if($tipo == 1){
                $ids = $relacion->id;
                return compact('ids','docentes');
            }else{
                $ids = -1;
                return compact('ids','docentes');
            }
        }catch(Exception $e){
            DB::rollback();
            return 0;
        }
    }

    public function add_docente(Request $request){
        $docente = $request->docente;
        $id = $request->id;


        DB::beginTransaction();

        try{
            $relacion = AsignaturaGrado::find($id);
            $relacion->f_profesor = $docente;
            $relacion->save();
            DB::commit();

            return 1;
        }catch(Exception $e){

            DB::rollback();
            return 0;
        }
    }

    public function lista(Request $request){
        $estudiantes = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
            ->where('matriculas.f_grado',$request->grado)
            ->where('matriculas.estado',true)
            ->orderBy('estudiantes.apellido')
            ->get();
        $grado = Grado::find($request->grado);
        $header = view('PDF.header');
        $footer = view('PDF.footer');
        $main = view('Lectivos.pdf.lista_estudiantes',compact('estudiantes','grado'));
        $pdf = \PDF::loadHtml($main)->setOption('footer-html',$footer)->setOption('header-html',$header)->setPaper('Letter');
        return $pdf->stream();
    }

    public function notas(Request $request){
        $grado = Grado::find($request->grado);
        $estudiantes = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
            ->where('matriculas.f_grado',$grado->id)
            ->where('matriculas.estado',true)
            ->select('estudiantes.id','estudiantes.nombre','estudiantes.apellido','estudiantes.nie','matriculas.id as matricula')
            ->orderBy('estudiantes.apellido')
            ->get();

        $asignaturas = Asignatura::
            join('asignatura_grados','asignaturas.id','asignatura_grados.f_asignatura')
            ->where('asignatura_grados.f_grado',$grado->id)
            ->select('asignaturas.*')
            ->orderBy('asignaturas.indice')->get();

        $header = view('PDF.header');
        $main = view('Lectivos.pdf.notas',compact(
            'estudiantes',
            'grado',
            'asignaturas'
        ));

         $pdf = \PDF::loadHtml($main)->setOption('header-html',$header)->setPaper('Letter');
        return $pdf->stream();
    }

    public function cuadro_final(Request $request){
        $id_grado = $request->grado;

        $estudiantes = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')
            ->where('matriculas.f_grado',$id_grado)
            ->select('estudiantes.id','estudiantes.nombre','estudiantes.apellido','estudiantes.nie','matriculas.id as matricula','estudiantes.sexo','matriculas.estado as estado')
            ->orderBy('estudiantes.apellido')
            ->get();

        $asignaturas = Asignatura::
            join('asignatura_grados','asignaturas.id','asignatura_grados.f_asignatura')
            ->where('asignatura_grados.f_grado',$id_grado)
            ->select('asignaturas.*')
            ->orderBy('asignaturas.indice')->get();

        $grado = Grado::find($id_grado);

        $header = view('PDF.header');
        $footer = view('PDF.footer');
        $main = view('Lectivos.pdf.cuadro_final',compact(
            'estudiantes',
            'grado',
            'asignaturas'
        ));

         $pdf = \PDF::loadHtml($main)->setOption('footer-html',$footer)->setOption('header-html',$header)->setPaper('Letter')->setOrientation('landscape');
        return $pdf->stream();
    }

    public function reprobados(Request $request){
        $anio = $request->anio;
        $estudiantes = Estudiante::join('matriculas','estudiantes.id','matriculas.f_estudiante')->join('grados','matriculas.f_grado','grados.id')->where('grados.f_lectivo',$anio)->where('matriculas.aprobado',false)->orderBy('grados.numero')->orderBy('estudiantes.apellido')->select('estudiantes.*','grados.*')->get();
        $lectivo = Lectivo::find($anio);

        $header = view('PDF.header');
        $footer = view('PDF.footer');
        $main = view('Lectivos.pdf.reprobados', compact(
            'estudiantes',
            'lectivo'
        ));

        $pdf = \PDF::loadHtml($main)->setOption('footer-html', $footer)->setOption('header-html', $header)->setPaper('Letter');
        return $pdf->stream();
    }

    public function retirados(Request $request)
    {
        $anio = $request->anio;
        $estudiantes = Estudiante::join('matriculas', 'estudiantes.id', 'matriculas.f_estudiante')->join('grados', 'matriculas.f_grado', 'grados.id')->where('grados.f_lectivo', $anio)->where('matriculas.estado', false)->orderBy('grados.numero')->orderBy('estudiantes.apellido')->select('estudiantes.*', 'grados.*')->get();
        $lectivo = Lectivo::find($anio);

        $header = view('PDF.header');
        $footer = view('PDF.footer');
        $main = view('Lectivos.pdf.retirados', compact(
            'estudiantes',
            'lectivo'
        ));

        $pdf = \PDF::loadHtml($main)->setOption('footer-html', $footer)->setOption('header-html', $header)->setPaper('Letter');
        return $pdf->stream();
    }
}
