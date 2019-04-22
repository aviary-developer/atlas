<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\Encargado;
use App\Lectivo;
use App\Matricula;
use App\Pariente;
use App\EstudiantePariente;
use App\Grado;
use App\EnfermedadEstudiante;
use App\EnfermedadFamilia;
use App\PartidaNacimiento;
use App\TelefonoUsuario;
use DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $estudiantes = Estudiante::where('estado',true)->orderBy('apellido')->get();
      return view('Estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lectivo=Lectivo::where('estado',0)->first();
        $grados=Grado::where('f_lectivo',$lectivo->id)->where('estado',0)->orderBy('numero','asc')->get();
      return view('Estudiantes.create2',compact('lectivo','grados'));
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
        $v_certificado = ($request->certificado == "on")?true:false;
        $v_libretaNotas = ($request->libretaNotas == "on")?true:false;

        try{
            $estudiante = Estudiante::create($request->all());
          $estudiante->certificado = $v_certificado;
          $estudiante->libretaNotas = $v_libretaNotas;
          $estudiante->save();
          if($request->actaNacimiento){
            $partida= new PartidaNacimiento;
            $partida->numero=$request->numero;
            $partida->folio=$request->folio;
            $partida->tomo=$request->tomo;
            $partida->libro=$request->libro;
            $partida->f_estudiante=$estudiante->id;
            $partida->save();
          }
          if($request->grado!="Negativo"){
            $matricula=new Matricula;
            $matricula->f_estudiante=$estudiante->id;
            $matricula->f_grado=$request->grado;
            $matricula->save();
          }
          if($request->nombre_e[0] != null){
            foreach($request->nombre_e as $k => $nombre_e){
                $enfermedad = new EnfermedadEstudiante;
                $enfermedad->nombre = $nombre_e;
                $enfermedad->atencion_medica = $request->atencion_e[$k];
                $enfermedad->medicamentos = $request->medicamentos_e[$k];
                $enfermedad->fecha = $request->fecha_e[$k];
                $enfermedad->resultados = $request->resultados_e[$k];
                $enfermedad->anio_vacuna = $request->anio_vacuna_e[$k];
                $enfermedad->tipo_vacuna = $request->tipo_vacuna_e[$k];
                $enfermedad->refuerzo_vacuna = $request->refuerzo_vacuna_e[$k];
                $enfermedad->f_estudiante = $estudiante->id;
                $enfermedad->save();
            }
          }

          for($i = 0; $i <= 5;$i++){
            $e_familia = new EnfermedadFamilia;
            $e_familia->asma = $request->asma[$i];
            $e_familia->drogas = $request->drogas[$i];
            $e_familia->diabetes = $request->diabetes[$i];
            $e_familia->tabaco = $request->tabaquismo[$i];
            $e_familia->presion_alta = $request->presionAlta[$i];
            $e_familia->alcohol = $request->alcoholismo[$i];
            $e_familia->renales = $request->renales[$i];
            $e_familia->otros = $request->otraEnfermedad[$i];
            $e_familia->pariente = $i;
            $e_familia->f_estudiante = $estudiante->id;
            $e_familia->save();
          }

            if(isset($request->par_tipo)){
                foreach($request->par_tipo as $k => $tipo){
                    $relacion = new EstudiantePariente;
                    $relacion->f_pariente = $request->par_id[$k];
                    $relacion->f_estudiante = $estudiante->id;
                    $relacion->parentesco = $request->par_parentesco[$k];
                    $relacion->encargado = $request->par_responsable[$k];
                    $relacion->save();
                }
            }
          DB::commit();
        }catch(Exception $e){
          DB::rollback();
          return redirect('/estudiantes')->with('mensaje', '¡Algo salio mal!');
        }
        return redirect('/estudiantes')->with('mensaje', '¡Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->anio == null){
            $lectivo_a = Lectivo::where('estado',0)->first();
        }else{
            $lectivo_a = Lectivo::find($request->anio);
        }
        $estudiante = Estudiante::find($id);
        $partida = PartidaNacimiento::where('f_estudiante',$id)->first();

        $lectivos = Lectivo::orderBy('anio','desc')->get();
        //Obtener la matricula del año activo
        $grado = Grado::
        join('matriculas','grados.id','matriculas.f_grado')
        ->join('estudiantes','matriculas.f_estudiante','estudiantes.id')
        ->where('grados.f_lectivo',$lectivo_a->id)
        ->where('estudiantes.id',$id)
        ->select('grados.*')
        ->first();
        return view('Estudiantes.show',compact(
            'estudiante',
            'partida',
            'lectivos',
            'lectivo_a',
            'grado'
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
      $estudiante = Estudiante::find($id);
      $partida = PartidaNacimiento::where('f_estudiante',$id)->first();
      $lectivo=Lectivo::where('estado',0)->first();
      $grados=Grado::where('f_lectivo',$lectivo->id)->where('estado',0)->orderBy('numero','asc')->get();
      $parientes = EstudiantePariente::where('f_estudiante',$id)->get();
      $enfermedad_parientes = EnfermedadFamilia::where('f_estudiante',$id)->orderBy('pariente')->get();
      return view('Estudiantes.edit2',compact(
          'estudiante',
          'partida',
          'lectivo',
          'grados',
          'parientes',
          'enfermedad_parientes'
        ));
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
        $v_certificado = ($request->certificado == "on")?true:false;
        $v_libretaNotas = ($request->libretaNotas == "on")?true:false;

        try {
            $estudiante = Estudiante::find($id);
            $estudiante->fill($request->all());
            $estudiante->certificado = $v_certificado;
            $estudiante->libretaNotas = $v_libretaNotas;
            $estudiante->save();
            DB::commit();
            return redirect('/estudiantes')->with('mensaje', '¡Guardado!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect('/estudiantes')->with('mensaje', '¡Algo salio mal!');
        }

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

    public function buscar_pariente(Request $request){
        $valor = $request->valor;
        $valor = trim($valor);
        $parientes = Pariente::where(
          function ($query) use ($valor){
            $query->where('nombre','like','%'.$valor.'%')
            ->orWhere('apellido','like','%'.$valor.'%')
            ->orWhere('dui','like','%'.$valor.'%');
          }
        )->where('estado',true)->orderBy('apellido')->take(4)->get();
        return $parientes;
    }

    public function delete_parentesco(Request $request){
        DB::beginTransaction();
        try {
            $relacion = EstudiantePariente::findOrFail($request->id);
            $relacion->delete();
            DB::commit();
            return 1;
        } catch (Exception $e) {
            DB::rollback();
            return 0;
        }
    }
}
