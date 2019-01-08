<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    {!!Html::style('css/app.css')!!}
  </head>
  <body>
    <div class="container">
      <hr>
      @if (session()->has('flash'))
        <div class="alert alert-info">
          {{session('flash')}}
        </div>
      @endif
      @yield('content')
    </div>
  </body>
</html>
