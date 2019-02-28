@extends('welcome')
@section('layout')
@include('Notas.Barra.index')
<div class="container-fluid mt-3">
    <div class="col-7">
        @include('Notas.Index.acordeon')
    </div>
</div>
@endsection
