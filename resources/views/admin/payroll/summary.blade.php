@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Resumen Asistencia {{$mes->nombre}}</h1><br/><br/>

<table id="tabla2">
    <tr height="50">
       <th width="150">Nombre</th>
       <th>Inasistencias</th>
       <th>Retrasos con 15min</th>
       <th>Retrasos con 15min</th>
       <th>Reporte Completo</th>
    </tr>
 
    @if($registros)
        @foreach($registros as $registro)
            <tr height="50">
             <td>{{$registro->nombre}}</td>
             <td>{{$registro->inasistencias}}</td>
             <td>{{$registro->retrasos_15min}}</td>
             <td>{{$registro->retrasos_60min}}</td>
             <td><input type ='button' class="btn btn-warning"  value = 'Ingresar' onclick="location.href = '{{ route('payroll.detail', [$registro->nombre, $registro->mes]) }}'"/></td>
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
