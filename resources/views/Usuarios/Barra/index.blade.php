<nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top">
    <a class="navbar-brand" href="#">
        Usuarios
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href={!! asset('/usuarios/create') !!}>
                    Nuevo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={!! asset('/usuarios/')!!}>
                    Mi Perfil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={!! asset('/usuario/permisos')!!}>
                    Permisos
                </a>
            </li>
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
