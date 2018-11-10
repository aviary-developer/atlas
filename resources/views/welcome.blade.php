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
            <a href="#device-controls" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-screen-tablet"></i> Device controls</a>
            <ul id="device-controls" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href="./pages/device-controls/camera.html" class="sidebar-nav-link">Camera</a>
              </li>
              <li>
                <a href="./pages/device-controls/file-manager.html" class="sidebar-nav-link">File manager</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-nav-group">
            <a href="#forms" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-pencil"></i> Forms</a>
            <ul id="forms" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href="./pages/forms/basic-form.html" class="sidebar-nav-link">Basic form</a>
              </li>
              <li>
                <a href="./pages/forms/multi-step-form.html" class="sidebar-nav-link">Multi step form</a>
              </li>
              <li>
                <a href="./pages/forms/tabbed-form.html" class="sidebar-nav-link">Tabbed form</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-nav-group">
            <a href="#input-controls" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-note"></i> Input controls</a>
            <ul id="input-controls" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href="./pages/input-controls/checkbox.html" class="sidebar-nav-link">Checkbox</a>
              </li>
              <li>
                <a href="./pages/input-controls/input-date.html" class="sidebar-nav-link">Input date</a>
              </li>
              <li>
                <a href="./pages/input-controls/input-group.html" class="sidebar-nav-link">Input group</a>
              </li>
              <li>
                <a href="./pages/input-controls/input-suggestion.html" class="sidebar-nav-link">Input suggestion</a>
              </li>
              <li>
                <a href="./pages/input-controls/label.html" class="sidebar-nav-link">Label</a>
              </li>
              <li>
                <a href="./pages/input-controls/radio-button.html" class="sidebar-nav-link">Radio button</a>
              </li>
              <li>
                <a href="./pages/input-controls/toggle-switch.html" class="sidebar-nav-link">Toggle switc</a>
              </li>
            </ul>
          </li>
          <li class="sidebar-nav-group">
            <a href="#layout" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-layers"></i> Layout</a>
            <ul id="layout" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href="./pages/layout/sidebar.html" class="sidebar-nav-link">Sidebar</a>
              </li>
              <li>
                <a href="./pages/layout/spinner.html" class="sidebar-nav-link">Spinner</a>
              </li>
              <li>
                <a href="./pages/layout/tabs.html" class="sidebar-nav-link">Tabs</a>
              </li>
              <li>
                <a href="./pages/layout/theming.html" class="sidebar-nav-link">Theming</a>
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
