@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('items.index', 'Regresar')}}
</div>

Datos Generales

@endsection


@section("general")

<table id="tabla2">

    <tr height="50">
       <th>Id</th>
       <td>{{$item->id}}</td>
    </tr>
    <tr height="50">
       <th>Titulo Profit</th>
       <td>{{$item->titulo}}</td>
    </tr>
    <tr height="50">
       <th>Titulo ML</th>
       <td>{{$item->nombre_ml}}</td>
    </tr>
    <tr height="50">
       <th>Codigo Profit</th>
       <td>{{$item->codigo_profit}}</td>
    </tr>
    <tr height="50">
       <th>Stock Actual</th>
       <td>{{$item->stock_general}}</td>
    </tr>
    <tr height="50">
       <th>Stock Disponible</th>
       <td>{{$item->stock_disponible}}</td>
    </tr>
    <tr height="50">
       <th>Comprometido Temporal</th>
       <td>{{$item->comprometido_temporal}}</td>
    </tr>
    <tr height="50">
       <th>Precio $</th>
       <td>{{$item->precio}}</td>
    </tr>
    <tr height="50">
       <th>Codigo ML3</th>
       <td>{{$item->ml3}}</td>
    </tr>
    <tr height="50">
       <th>Variante ML3</th>
       <td>{{$item->ml5}}</td>
    </tr>
    <tr height="50">
       <th>Codigo ML4</th>
       <td>{{$item->ml4}}</td>
    </tr>
    <tr height="50">
       <th>Variante ML4</th>
       <td>{{$item->variante_ml4}}</td>
    </tr>
    <tr height="50">
       <th>Estatus ML</th>
       <td>{{$item->estatus_ml}}</td>
    </tr>
    <tr height="50">
       <th>Tiempo Activo (Minutos)</th>
       <td>{{$item->tiempo_activo}}</td>
    </tr>
    <tr height="50">
       <th>Ventas Activas</th>
       <td>{{$item->vendidos_ml}}</td>
    </tr>
    
</table>

<br/>

<div>
<table>

<input type ='button' class="btn btn-warning"  value = 'Actualizar' onclick="location.href = '{{ route('items.edit', $item->id) }}'"/>

</table>
</div>

@endsection
