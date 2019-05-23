<div class="bg-navy p-1 rounded-top mt-2">
    <center>
        <span class="text-light font-lg font-weight-light">
            Información
        </span>
    </center>
</div>
<div class="bg-teal">
    <center>
        <span class="font-lg font-weight-bold text-dark">
            {{$ga->grado}}
        </span>
    </center>
    <center class="m-0">
        <span class="font-sm text-monospace">
            {{'Sección '.$ga->seccion}} &centerdot; {{($ga->turno)?'Matutino':'Vespertino'}}
        </span>
    </center>
</div>
<div class="class bg-blue rounded-bottom pb-1">
    <center>
        <b>Matricula actual</b>
    </center>
    <div class="row">
        <div class="col-8">
            <span class="ml-3">
                Masculino
            </span>
        </div>
        <div class="col-4">
            <center>
                <span class="badge bg-teal col-10">
                    {{$count_estudiantes_m}}
                </span>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <span class="ml-3">
                Femenino
            </span>
        </div>
        <div class="col-4">
            <center>
                <span class="badge bg-teal col-10">
                    {{$count_estudiantes_f}}
                </span>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <span class="ml-3">
                Total
            </span>
        </div>
        <div class="col-4">
            <center>
                <span class="badge bg-primary col-10">
                    {{$count_estudiantes_total}}
                </span>
            </center>
        </div>
    </div>
    <hr class="my-1">
    <center>
        <b>Matricula inicial</b>
    </center>
    <div class="row">
        <div class="col-8">
            <span class="ml-3">
                Masculino
            </span>
        </div>
        <div class="col-4">
            <center>
                <span class="badge bg-teal col-10">
                    {{$count_estudiantes_m_inicial}}
                </span>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <span class="ml-3">
                Femenino
            </span>
        </div>
        <div class="col-4">
            <center>
                <span class="badge bg-teal col-10">
                    {{$count_estudiantes_f_inicial}}
                </span>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <span class="ml-3">
                Total
            </span>
        </div>
        <div class="col-4">
            <center>
                <span class="badge bg-primary col-10">
                    {{$count_estudiantes_total_inicial}}
                </span>
            </center>
        </div>
    </div>
</div>
