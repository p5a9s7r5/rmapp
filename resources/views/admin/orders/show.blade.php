@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Regresar')}}
</div>

Datos Generales

@endsection


@section("general")

<table width="500" border="1" style="margin: 0 auto;">

    <tr height="50">
       <th>Id</th>
       <td>{{$order->pedidos_id}}</td>
    </tr>
    <tr height="50">
       <th>Nro Oferta</th>
       <td>{{$order->codigo_venta}}</td>
    </tr>
    <tr height="50">
       <th>Seudonimo</th>
       <td>{{$order->seudonimo}}</td>
    </tr>
    <tr height="50">
       <th>Nombre</th>
       <td>{{$order->nombre}}</td>
    </tr>
    <tr height="50">
       <th>Telefono</th>
       <td>{{$order->telefono}}</td>
    </tr>
    <tr height="50">
       <th>Ubicacion</th>
       <td>{{$order->ubicacion}}</td>
    </tr>
    <tr height="50">
       <th>Articulo</th>
       <td>{{$order->titulo_publicacion}}</td>
    </tr>
    <tr height="50">
       <th>Codigo Profit</th>
       <td>{{$order->codigo_profit}}</td>
    </tr>
    <tr height="50">
       <th>Variacion</th>
       <td>{{$order->variacion_nombre}}</td>
    </tr>
    <tr height="50">
       <th>Costo</th>
       <td>{{$order->costo}}</td>
    </tr>
    <tr height="50">
       <th>Cantidad</th>
       <td>{{$order->cantidad}}</td>
    </tr>
    <tr height="50">
       <th>Variante ML4</th>
       <td>{{$order->variante_ml4}}</td>
    </tr>
    <tr height="50">
       <th>Fecha</th>
       <td>{{$order->fecha}}</td>
    </tr>
    <tr height="50">
       <th>Pedido Profit</th>
       <td>{{$order->pedido_profit}}</td>
    </tr>
    <tr height="50">
       <th>Estatus</th>
       <td>{{$order->estatus}}</td>
    </tr>
    
</table>

<br/>

<div>
<table>

<input type ='button' class="btn btn-warning"  value = 'Actualizar' onclick="location.href = '{{ route('orders.edit', $order->pedidos_id) }}'"/>

</table>
</div>

@endsection
