<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Estudiantes
        <span class="badge badge-light text-primary">{{$lectivo->anio}}</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            @if (Auth::user()->tipoUsuario != "Docente")
                <li class="nav-item">
                    <a class="nav-link" href={!! asset('/estudiantes/create') !!}>
                        Nuevo
                    </a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Ayuda
                </a>
            </li>
        </ul>
    </div>
</nav>
