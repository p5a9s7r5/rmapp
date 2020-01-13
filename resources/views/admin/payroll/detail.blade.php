@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Asistencia {{$nombre}} - {{$mes->nombre}}</h1><br/><br/>

<table id="tabla2">
    <tr height="50">
       <th>Fecha</th>
       <th>Hora Entrada</th>
       <th>Hora Salida</th>
       <th>Dia</th>
       <th>Retraso en Minutos</th>
    </tr>

    @if($registros)
        @foreach($registros as $registro)
            <tr height="50">
             <td>{{$registro->fecha}}</td>
             <td>{{$registro->entrada}}</td>
             <td>{{$registro->salida}}</td>
             <td width=20%>{{$registro->dia}}</td>
             <td width=20%>{{$registro->retraso}}</td>
            </tr>
        @endforeach
    @endif
</table>

<br/>
<table style="margin: 0 auto;">
   <tr height="65">
      <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
   </tr>
</table>

@endsection
