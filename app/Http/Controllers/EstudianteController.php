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
          if($request->nombreEncargadoM){
            foreach ($request->nombreEncargadoM as $key => $encargados) {
              $encargado= new Encargado;
              $encargado->nombre=$request->nombreEncargadoM[$key];
              $encargado->apellido=$request->apellidoEncargadoM[$key];
              $encargado->dui=$request->duiEncargadoM[$key];
              $encargado->correo=$request->correoEncargadoM[$key];
              $encargado->direccion=$request->direccionEncargadoM[$key];
              $encargado->telefono=$request->telefonoEncargadoM[$key];
              $encargado->celular=$request->celularEncargadoM[$key];
              $encargado->f_estudiante=$estudiante->id;
              $encargado->save();
            }
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
                    if($tipo == "new"){
                        $pariente = new Pariente;
                        $pariente->nombre = $request->par_nombre[$k];
                        $pariente->apellido = $request->par_apellido[$k];
                        $pariente->sexo = $request->par_sexo[$k];
                        $pariente->correo = $request->par_correo[$k];
                        $pariente->telefono_fijo = $request->par_fijo[$k];
                        $pariente->dui = $request->par_dui[$k];
                        $pariente->telefono_celular = $request->par_celular[$k];
                        $pariente->direccion = $request->par_direccion[$k];
                        $pariente->sabe_leer = $request->par_sabe_leer[$k];
                        $pariente->sabe_escribir = $request->par_sabe_escribir[$k];
                        $pariente->ultimo_grado = $request->par_ultimo_grado[$k];
                        $pariente->ultimo_anio = $request->par_ultimo_anio[$k];
                        $pariente->fecha_nacimiento = $request->par_fecha_nacimiento[$k];
                        $pariente->nacionalidad = $request->par_nacionalidad[$k];
                        $pariente->estado_civil = $request->par_estado_civil[$k];
                        $pariente->ocupacion = $request->par_ocupacion[$k];
                        $pariente->lugar_trabajo = $request->par_lugar_trabajo[$k];
                        $pariente->save();
                        $pariente_id = $pariente->id;
                    }else{
                        $pariente_id = $request->par_id[$k];
                    }
                    $relacion = new EstudiantePariente;
                    $relacion->f_pariente = $pariente_id;
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
      $estudiante = Estudiante::find($id);
      $partida = PartidaNacimiento::where('f_estudiante',$id)->first();
      //dd($partida);
      return view('Estudiantes.edit',compact('estudiante','partida'));
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

    public function buscar_pariente(Request $request){
        $valor = $request->valor;
        $valor = trim($valor);
        $parientes = Pariente::where(
          function ($query) use ($valor){
            $query->where('nombre','like','%'.$valor.'%')
            ->orWhere('apellido','like','%'.$valor.'%')
            ->orWhere('dui','like','%'.$valor.'%');
          }
        )->where('estado',true)->orderBy('apellido')->take(5)->get();
        return $parientes;
    }
}
