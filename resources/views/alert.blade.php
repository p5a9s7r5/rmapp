@extends("layouts.plantillaforms")

@section("cabecera")

<img src="/images/logo.jpg" class="imgcabecera">

@endsection

@section("general")

    <h2>{{ auth()->user()->name }}, aun no se ha verificado tu acceso, comunicate con el administrador!</h2><br/><br/>

@endsection

@section("pie")

@endsection