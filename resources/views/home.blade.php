<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atlas</title>
    {!!Html::style('css/app.css')!!}
</head>

<body class="h-100">
    {{-- Barra de navegeación superior --}}
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Atlas</a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="#" class="nav-link">Académica</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">PASE</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Permisos</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Libro de Bancos</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Configuración</a>
            </li>
        </ul>
    </nav>
    {{-- Barra de configuración lateral --}}

    <div class="container-fluid h-100">
        <div class="row">
        </div>
        <div class="row h-100">
            <div class="col-2 bg-info" style="height: calc(100vh - 3.44rem)">
                <nav class="navbar flex-column navbar-dark">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Turnos</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Grados</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Secciones</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Alumnos</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Configuración</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-10" id="hi">
                Hola
            </div>
        </div>
    </div>
    <script>
        $("#hi").hide();
    </script> {{-- Ficheros js --}} {!!Html::script('js/app.js')!!}
</body>

</html>
