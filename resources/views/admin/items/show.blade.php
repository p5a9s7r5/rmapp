@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Datos Articulo</h1><br/><br/>

<table id="tabla2">

    <tr height="65">
       <th width="40%">Id</th>
       <td>{{$item->id}}</td>
    </tr>
    <tr height="65">
       <th>Titulo Profit</th>
       <td>{{$item->titulo}}</td>
    </tr>
    <tr height="65">
       <th>Titulo ML</th>
       <td>{{$item->nombre_ml}}</td>
    </tr>
    <tr height="65">
       <th>Codigo Profit</th>
       <td>{{$item->codigo_profit}}</td>
    </tr>
    <tr height="65">
       <th>Stock Actual</th>
       <td>{{$item->stock_general}}</td>
    </tr>
    <tr height="65">
       <th>Stock Disponible</th>
       <td>{{$item->stock_disponible}}</td>
    </tr>
    <tr height="65">
       <th>Comprometido Temporal</th>
       <td>{{$item->comprometido_temporal}}</td>
    </tr>
    <tr height="65">
       <th>Precio $</th>
       <td>{{number_format($item->precio/1000,2)}}</td>
    </tr>
    <tr height="65">
       <th>Precio Bs</th>
       <td>{{number_format($item->precio*$tasa->valor,2, ",", ".")}}</td>
    </tr>
    <tr height="65">
       <th>Codigo ML3</th>
       <td>{{$item->ml3}}</td>
    </tr>
    <tr height="65">
       <th>Variante ML3</th>
       <td>{{$item->ml5}}</td>
    </tr>
    <tr height="65">
       <th>Codigo ML4</th>
       <td>{{$item->ml4}}</td>
    </tr>
    <tr height="65">
       <th>Variante ML4</th>
       <td>{{$item->variante_ml4}}</td>
    </tr>
    <tr height="65">
       <th>Estatus ML</th>
       <td>{{$item->estatus_ml}}</td>
    </tr>
    <tr height="65">
       <th>Tiempo Activo (Minutos)</th>
       <td>{{$item->tiempo_activo}}</td>
    </tr>
    <tr height="65">
       <th>Ventas Activas</th>
       <td>{{$item->vendidos_ml}}</td>
    </tr>
    
</table>

<br/>

<div>
<table style="margin: 0 auto;">
   <tr height="65">
      <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
      <td><input type ='button' class="btn btn-warning"  value = 'Actualizar' onclick="location.href = '{{ route('items.edit', $item->id) }}'"/></td>
   </tr>
</table>
</div>

@endsection
