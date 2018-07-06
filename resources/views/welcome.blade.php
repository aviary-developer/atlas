<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin 4B · Get started</title>
  <link rel="icon" href="./favicon.ico">
  {!!Html::style('css/admin4b.css')!!}
  {!!Html::style('css/all.css')!!}
</head>

<body>
  <div class="app">
    <div class="app-body">
      <div class="app-sidebar sidebar-slide-left">
        <div class="text-right">
          <button type="button" class="btn btn-sidebar" data-dismiss="sidebar">
            <span class="x"></span>
          </button>
        </div>
        <div class="sidebar-header">
          <img src={{asset("img/john-doe.png")}} class="user-photo">
          <p class="username">John Doe
            <br>
            <small>Administrator</small>
          </p>
        </div>
        <ul id="sidebar-nav" class="sidebar-nav">
          <li class="sidebar-nav-btn">
            <a href="./index.html" class="btn btn-block btn-outline-light">Get started</a>
          </li>
          <li class="sidebar-nav-group">
            <a href="#content" class="sidebar-nav-link" data-toggle="collapse">
              <i class="icon-doc"></i> Content</a>
            <ul id="content" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href="./pages/content/blank-page.html" class="sidebar-nav-link">Blank page</a>
              </li>
              <li>
                <a href="./pages/content/details-page.html" class="sidebar-nav-link">Details page</a>
              </li>
              <li>
                <a href="./pages/content/dashboard.html" class="sidebar-nav-link">Dashboard</a>
              </li>
              <li>
                <a href="./pages/content/error-404.html" class="sidebar-nav-link">Error 404</a>
              </li>
              <li>
                <a href="./pages/content/error-500.html" class="sidebar-nav-link">Error 500</a>
              </li>
              <li>
                <a href="./pages/content/timeline.html" class="sidebar-nav-link">Timeline</a>
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
              <i class="icon-notebook"></i> Reference</a>
            <ul id="reference" class="collapse" data-parent="#sidebar-nav">
              <li>
                <a href="./pages/reference/callout.html" class="sidebar-nav-link">Callout</a>
              </li>
              <li>
                <a href="./pages/reference/code-highlight.html" class="sidebar-nav-link">Code highlight</a>
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
        <nav class="navbar navbar-expand navbar-light bg-white">
          <button type="button" class="btn btn-sidebar" data-toggle="sidebar">
            <i class="fa fa-bars"></i>
          </button>
          <div class="navbar-brand">Admin 4B &middot;
            <a href="https://github.com/marxjmoura/admin4b" class="text-dark" data-toggle="tooltip" data-placement="right"
              title="Fork me on GitHub">
              <i class="fab fa-github"></i>
            </a>
          </div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-pill badge-primary">3</span>
                <i class="far fa-bell"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="./pages/content/notification.html" class="dropdown-item">
                  <small class="dropdown-item-title">Lorem ipsum (today)</small>
                  <br>
                  <div>Lorem ipsum dolor sit amet...</div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="./pages/content/notification.html" class="dropdown-item">
                  <small class="text-secondary">Lorem ipsum (yesterday)</small>
                  <br>
                  <div>Lorem ipsum dolor sit amet...</div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="./pages/content/notification.html" class="dropdown-item">
                  <small class="text-secondary">Lorem ipsum (12/25/2017)</small>
                  <br>
                  <div>Lorem ipsum dolor sit amet...</div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="./pages/content/notifications.html" class="dropdown-item dropdown-link">See all notifications</a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          @yield('layout')
          <!--
          <h1>Introduction</h1>
          <p>Admin 4B is an open source admin template built on top of
            <a href="https://getbootstrap.com/">Bootstrap 4</a>. The source code can be found on the
            <a href="https://github.com/marxjmoura/admin4b">GitHub repo</a>.</p>
          <h2>Quick start</h2>
          <p>This template uses many bootstrap features, so you need to have some knowledge in this toolkit. Before you continue,
            please, take a look at the
            <a href="https://getbootstrap.com/">bootstrap documentation</a>.</p>
          <p>For the template work properly you need to add Bootstrap dependencies:
            <a href="https://jquery.com/">jQuery</a> and
            <a href="https://popper.js.org/">Popper</a>. Also, add
            <a href="http://fontawesome.io/">Font Awesome</a> and
            <a href="http://simplelineicons.com/">Simple Line Icons</a> CSS files. Then
            <a href="https://github.com/marxjmoura/admin4b#quick-start">download the latest release</a> of the template Admin 4B.</p>
          <div class="callout callout-warning">
            <h5>Bootstrap files</h5>
            <p>You do
              <strong>not</strong> need to reference bootstrap files because they are already included in
              <code>admin4b.css</code> and
              <code>admin4b.js</code>.</p>
          </div>
          <h3>CSS</h3>
          <p>Copy-paste the stylesheet
            <code>&lt;link&gt;</code> into your
            <code>&lt;head&gt;</code> after the font stylesheets to load our CSS.</p>
          <div class="source-code">
            <a href="#css-setup" data-toggle="collapse">
              <i class="fa fa-code"></i> Source code</a>
            <div id="css-setup" class="sidebar-nav-group collapse">
              <pre><code class="html">&lt;!-- link to Font Awesome CSS --&gt;
&lt;!-- link to Simple Line Icons CSS --&gt;
&lt;link rel="stylesheet" href="admin4b.min.css"&gt;
</code></pre>
            </div>
          </div>
          <h3>JS</h3>
          <p>Place the following
            <code>&lt;script&gt;</code> tags near the end of your pages, right before the closing
            <code>&lt;body&gt;</code> tag. Bootstrap denpencies must come first and then our JavaScript plugins.</p>
          <div class="source-code">
            <a href="#js-setup" data-toggle="collapse">
              <i class="fa fa-code"></i> Source code</a>
            <div id="js-setup" class="sidebar-nav-group collapse">
              <pre><code class="html">&lt;!-- script to jQuery --&gt;
&lt;!-- script to Popper --&gt;
&lt;script src="admin4b.min.js"&gt;&lt;/script&gt;
</code></pre>
            </div>
          </div>
          <h2>Initial setup</h2>
          <p>An example code of the initial setup can be seen below.</p>
          <div class="source-code">
            <a href="#initial-setup" data-toggle="collapse">
              <i class="fa fa-code"></i> Source code</a>
            <div id="initial-setup" class="sidebar-nav-group collapse">
              <pre><code class="html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"&gt;
    &lt;!-- link to Font Awesome CSS --&gt;
    &lt;!-- link to Simple Line Icons CSS --&gt;
    &lt;link rel="stylesheet" href="admin4b.min.css"&gt;
    &lt;title&gt;Admin 4B&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;!-- script to jQuery --&gt;
    &lt;!-- script to Popper --&gt;
    &lt;script src="admin4b.min.js"&gt;&lt;/script&gt;
  &lt;/body&gt;
&lt;/html&gt;
</code></pre>
            </div>
          </div>
          <div class="callout callout-info">
            <h5>JavaScript initialization</h5>
            <p>All components (including bootstrap) are automatically initialized by the template.</p>
          </div>
          <h2>"What's next?"</h2>
          <p>
            <a href="./pages/layout/sidebar.html">Configure the sidebar navigation</a>
          </p>-->
        </div>
      </div>
    </div>
  </div>
  <script src= {{asset("js/app.js")}}></script>
  <script src= {{asset("js/admin4b.min.js")}}></script>
  {{--  <script src="./assets/js/admin4b.docs.js"></script>  --}}
</body>

</html>
