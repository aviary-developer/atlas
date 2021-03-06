<div class="nav-tabs-responsive">
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a href="#tb1" class="nav-link active" data-toggle="tab">
            <i class="icon-user"></i> Estudiantes
            </a>
        </li>
        <li class="nav-item">
            <a href="#tb2" class="nav-link" data-toggle="tab">
                <i class="icon-briefcase"></i> Asignaturas
            </a>
        </li>
    </ul>
    <div class="tab-content" id="tab-contents">
        <div id="tb1" class="tab-pane show active">
            <div id="tb1-collapse" class="collapse" data-parent="#tab-contents">
                @include('Lectivos.partes.estudiantes')
            </div>
        </div>
        <div id="tb2" class="tab-pane">
            <div id="tb2-collapse" class="collapse" data-parent="#tab-contents">
                @include('Lectivos.partes.asignaturas')
            </div>
        </div>
    </div>
</div>
