@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Regresar')}}
</div>

Datos Generales

@endsection


@section("general")

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

@if($pago)

    <tr height="50">
       <th></th>
       <th>Datos Agregados</th>
    </tr>
    <tr height="50">
       <th>Despacho</th>
       <td>{{$pago->despacho}}</td>
    </tr>
    <tr height="50">
       <th>Email</th>
       <td>{{$order->email}}</td>
    </tr>
    <tr height="50">
       <th>Articulo segun Cliente</th>
       <td>{{$pago->articulo}}</td>
    </tr>
    <tr height="50">
       <th>Articulos Adicionales</th>
       <td>{{$pago->otrosart}}</td>
    </tr>
    <tr height="50">
       <th>Cantidad segun Cliente</th>
       <td>{{$pago->cantidad}}</td>
    </tr>
    <tr height="50">
       <th></th>
       <th>Datos Pago</th>
    </tr>
    <tr height="50">
       <th>Fecha</th>
       <td>{{$pago->fecha}}</td>
    </tr>
    <tr height="50">
       <th>Banco</th>
       <td>{{$pago->banco}}</td>
    </tr>
    <tr height="50">
       <th>Banco Origen</th>
       <td>{{$pago->interbancario}}</td>
    </tr>
    <tr height="50">
       <th>Monto</th>
       <td>{{$pago->monto}}</td>
    </tr>
    <tr height="50">
       <th>Referencia</th>
       <td>{{$pago->referencia}}</td>
    </tr>
    <tr height="50">
       <th>Transferencias Adicionales</th>
       <td>{{$pago->otrastr}}</td>
    </tr>
    <tr height="50">
       <th>Factura Profit</th>
       <td>{{$order->factura_profit}}</td>
    </tr>
    
    
@endif

@if($envio)

    <tr height="50">
       <th></th>
       <th>Datos Envio</th>
    </tr>
    <tr height="50">
       <th>Nombre Destinatario</th>
       <td>{{$envio->nombre}}</td>
    </tr>
    <tr height="50">
       <th>Nro Cedula</th>
       <td>{{$envio->cedula}}</td>
    </tr>
    <tr height="50">
       <th>Telefono</th>
       <td>{{$envio->telefono}}</td>
    </tr>
    <tr height="50">
       <th>Direccion</th>
       <td>{{$envio->direccion}}</td>
    </tr>
    <tr height="50">
       <th>Ciudad / Estado</th>
       <td>{{$envio->ciudad}}</td>
    </tr>
    
@endif

</table><br/>

<div>
<table style="margin: 0 auto;">
   <tr>
      @if($envio)
      <td><input type ='button' class="btn btn-warning"  value = 'Editar Envio' onclick="location.href = '{{ route('orders.shipedit', $envio->id) }}'"/></th>
      @endif
      <td><input type ='button' class="btn btn-warning"  value = 'Editar Pedido' onclick="location.href = '{{ route('orders.edit', $order->pedidos_id) }}'"/></th>
   </tr>
</table><br/>
</div>

@endsection
