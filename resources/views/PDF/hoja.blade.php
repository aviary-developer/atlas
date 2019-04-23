<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reporte</title>
    <link rel="icon" href="./favicon.ico">
    {!!Html::style('css/admin4b.css')!!}
    {!!Html::style('css/all.css')!!}
    {!!Html::style('css/datatables.min.css')!!}
    {!!Html::style('css/pnotify.custom.min.css')!!}
    <script src= {{asset("js/app.js")}}></script>

    <style type="text/css">
        div.page
        {
            page-break-after: always;
            page-break-inside: avoid;
        }
        </style>
</head>
<body class="bg-light">
    @yield('layout')
</body>
</html>
