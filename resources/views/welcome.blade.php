<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Atlas</title>
  <link rel="icon" href="./favicon.ico">
  {!!Html::style('css/admin4b.css')!!}
  {!!Html::style('css/all.css')!!}
  {!!Html::style('css/datatables.min.css')!!}
  {!!Html::style('css/pnotify.custom.min.css')!!}
  <script src= {{asset("js/app.js")}}></script>
</head>

<body>
  <div class="app">
    <div class="app-body">
      <div class="app-sidebar sidebar-slide-left">
        <div class="sidebar-header">
          <img src={{asset("img/john-doe.png")}} class="user-photo">
          <p class="username">John Doe
            <br>
            <small>Administrator</small>
          </p>
        </div>
        <ul id="sidebar-nav" class="sidebar-nav">
          <li class="sidebar-nav-btn">
            <a href="/atlas" class="btn btn-block btn-outline-info text-light">Atlas</a>
          </li>
          <li class="sidebar-nav-group">
            <a href="#content" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-doc"></i> Acádemica</a>
            <ul id="content" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href={{asset('/estudiantes')}} class="sidebar-nav-link">Estudiantes</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-nav-group">
            <a href="#reference" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-settings"></i> Configuración</a>
            <ul id="reference" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href={{asset("grados")}} class="sidebar-nav-link">Grados</a>
              </li>
              <li>
                <a href={{asset("asignaturas")}} class="sidebar-nav-link">Asignaturas</a>
              </li>
              <li>
                <a href={{asset("usuarios")}} class="sidebar-nav-link">Usuarios</a>
              </li>
            </ul>
          </li>
        </ul>
        <div class="sidebar-footer">
          <a href="./pages/content/chat.html" data-toggle="tooltip" title="Support">
            <i class="fa fa-comment"></i>
          </a>
          <a href="./pages/content/settings.html" data-toggle="tooltip" title="Settings">
            <i class="fa fa-cog"></i>
          </a>
          <a href="./pages/content/signin.html" data-toggle="tooltip" title="Logout">
            <i class="fa fa-power-off"></i>
          </a>
        </div>
      </div>
      <div class="app-content">
        @yield('layout')
      </div>
    </div>
  </div>
  <!-- InputMask -->
  {!!Html::script('js/Inputmask/dist/min/jquery.inputmask.bundle.min.js')!!}
  {!!Html::script('js/moment.min.js')!!}

  <script src= {{asset("js/pnotify.custom.min.js")}}></script>
  <script src= {{asset("js/datatables.js")}}></script>
  <script src= {{asset("js/generalidades.js")}}></script>
</body>

</html>
