@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h2>Hola {{ auth()->user()->name }}!</h2><br/><br/>

<table id="tabla5">
    <tr height="50">
       <th width="40%">Acciones</th>
       <th>Valores</th>
       <th>Tiempo</th>
    </tr>

    <tr height="50">
        <td>Pagos por Verificar</td>
        <td>{{$pagos}}</td>
        <td>actual</td>
    </tr>
    <tr height="50">
        <td>Pedidos por Enviar</td>
        <td>{{$envios}}</td>
        <td>actual</td>
    </tr>
    <tr height="50">
        <td>Guias por Cargar</td>
        <td>{{$guias}}</td>
        <td>actual</td>
    </tr>
    <tr height="50">
        <td>Ofertas Recientes</td>
        <td>{{$ofertas}}</td>
        <td>ultimos 7 dias</td>
    </tr>
    <tr height="50">
        <td>Preguntas Pendientes</td>
        <td>{{$prom_actual->preguntas}}</td>
        <td>12pm / 5pm</td>
    </tr>
    <tr height="50">
        <td>Promedio Actual Preguntas</td>
        <td>{{$prom_actual->promedio_preg}}%</td>
        <td>desde el lunes</td>
    </tr>
    <tr height="50">
        <td>Promedio Anterior Preguntas</td>
        <td>{{$prom_anterior->promedio_preg}}%</td>
        <td>semana anterior</td>
    </tr>
    <tr height="50">
        <td>Pedidos con Mensajes Pendientes</td>
        <td>{{$prom_actual->mensajeria}}</td>
        <td>12pm / 5pm</td>
    </tr>
    <tr height="50">
        <td>Promedio Actual Mensajeria</td>
        <td>{{$prom_actual->promedio_mens}}%</td>
        <td>desde el lunes</td>
    </tr>
    <tr height="50">
        <td>Promedio Anterior Mensajeria</td>
        <td>{{$prom_anterior->promedio_mens}}%</td>
        <td>semana anterior</td>
    </tr>
    <tr height="50">
        <td>Tasa / Paridad Actual</td>
        <td>{{number_format($tasa->valor*1000,0, ",", ".")}}</td>
        <td>{{$tasa->updated_at}}</td>
    </tr>
</table>

@endsection

@section("pie")

@endsection