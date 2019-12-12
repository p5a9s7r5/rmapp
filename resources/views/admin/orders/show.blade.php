@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Datos Generales</h1><br/><br/>

<table id="tabla3">

    <tr height="50">
       <th></th>
       <th>Datos Pedido</th>
    </tr>
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

@if($order->fecha_pago)

    <tr height="50">
       <th></th>
       <th>Datos Agregados</th>
    </tr>
    <tr height="50">
       <th>Despacho</th>
       <td>{{$order->despacho}}</td>
    </tr>
    <tr height="50">
       <th>Email</th>
       <td>{{$order->email}}</td>
    </tr>
    <tr height="50">
       <th>Articulo segun Cliente</th>
       <td>{{$order->articulo_cliente}}</td>
    </tr>
    <tr height="50">
       <th>Articulos Adicionales</th>
       <td>{{$order->otros_articulos}}</td>
    </tr>
    <tr height="50">
       <th>Cantidad segun Cliente</th>
       <td>{{$order->cantidad_cliente}}</td>
    </tr>
    <tr height="50">
       <th></th>
       <th>Datos Pago</th>
    </tr>
    <tr height="50">
       <th>Fecha</th>
       <td>{{$order->fecha_pago}}</td>
    </tr>
    <tr height="50">
       <th>Banco</th>
       <td>{{$order->banco}}</td>
    </tr>
    <tr height="50">
       <th>Banco Origen</th>
       <td>{{$order->interbancario}}</td>
    </tr>
    <tr height="50">
       <th>Monto</th>
       <td>{{$order->monto_pago}}</td>
    </tr>
    <tr height="50">
       <th>Referencia</th>
       <td>{{$order->referencia_pago}}</td>
    </tr>
    <tr height="50">
       <th>Transferencias Adicionales</th>
       <td>{{$order->otros_pagos}}</td>
    </tr>
    <tr height="50">
       <th>Factura Profit</th>
       <td>{{$order->factura_profit}}</td>
    </tr>

@endif

@if($order->destinatario)

    <tr height="50">
       <th></th>
       <th>Datos Envio</th>
    </tr>
    <tr height="50">
       <th>Nombre Destinatario</th>
       <td>{{$order->destinatario}}</td>
    </tr>
    <tr height="50">
       <th>Nro Cedula</th>
       <td>{{$order->cedula}}</td>
    </tr>
    <tr height="50">
       <th>Telefono</th>
       <td>{{$order->telefono}}</td>
    </tr>
    <tr height="50">
       <th>Direccion</th>
       <td>{{$order->direccion_envio}}</td>
    </tr>
    <tr height="50">
       <th>Ciudad / Estado</th>
       <td>{{$order->ciudad_envio}}</td>
    </tr>
    <tr height="50">
       <th>Guia Envio</th>
       <td>{{$order->guia_envio}}</td>
    </tr>
    
@endif

</table><br/>

<div>
<table style="margin: 0 auto;">
   <tr>
      <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
      @if($order->destinatario)
      <td><input type ='button' class="btn btn-warning"  value = 'Editar Envio' onclick="location.href = '{{ route('orders.shipedit', $order->pedidos_id) }}'"/></th>
      @endif
      <td><input type ='button' class="btn btn-warning"  value = 'Editar Pedido' onclick="location.href = '{{ route('orders.edit', $order->pedidos_id) }}'"/></th>
   </tr>
</table><br/>
</div>

@endsection
