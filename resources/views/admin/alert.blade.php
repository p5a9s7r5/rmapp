@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<br/><br/><br/><br/><br/><br/>

@if($id == 1)

    <h2>{{ auth()->user()->name }}, no tienes acceso a esta pagina, comunicate con el administrador!</h2><br/><br/>

@endif

@if($id == 2)

    <h2>No hay pedidos nuevos por cargar!</h2><br/><br/>

@endif

@endsection

@section("pie")

@endsection