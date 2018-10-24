@if (App\AsignaturaGrado::asignatura_grado($asignatura->id,$grado->id))
    <select name="" id={{"asesor-select-".$relacion->id}} class="form-control form-control-sm" data-value={{$relacion->id}}>
        @if($relacion->f_profesor== null)
            <option value=null selected>Ninguno</option>
        @else
            <option value=null>Ninguno</option>
        @endif
        @foreach ($docentes as $docente)
            @if ($relacion->f_profesor == $docente->id)
                <option value={{$docente->id}} selected>{{$docente->nombre.' '.$docente->apellido}}</option>
            @else
                <option value={{$docente->id}}>{{$docente->nombre.' '.$docente->apellido}}</option>
            @endif
        @endforeach
    </select>
@else
    <span class="badge border border-danger text-danger">
        Agregue la asignatura
    </span>
    <span class="badge badge-danger">
        <i class="fas fa-arrow-right"></i>
    </span>
@endif
