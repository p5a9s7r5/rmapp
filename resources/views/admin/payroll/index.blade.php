@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Control de Asistencia</h1><br/><br/>

<table id="tabla2">
    <tr height="50">
       <th width="150">Fecha</th>
       <th>Promedio Inasistencias</th>
       <th>Retrasos con 15min</th>
       <th>Retrasos con 15min</th>
       <th>Ver Detalles</th>
    </tr>
 
    @if($registros)
        @foreach($registros as $registro)
            <tr height="50">
             <td>{{$registro->nombre}}</td>
             <td>{{$registro->inasistencias}}</td>
             <td>{{$registro->retrasos_15min}}</td>
             <td>{{$registro->retrasos_60min}}</td>
             <td><input type ='button' class="btn btn-warning"  value = 'Ingresar' onclick="location.href = '{{ route('payroll.summary', $registro->mes) }}'"/></td>
            </tr>
        @endforeach
    @endif
</table>

@endsection
