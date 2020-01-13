@extends("layouts.plantilla")

@section("cabecera")

@endsection


@section("general")

<h1>Clientes por Contactar</h1><br/><br/>

<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Fecha Oferta</th>
       <th>Nombre</th>
       <th>Telefono</th>
       <th>Articulo</th>
       <th>Ultima Nota</th>
       <th>Notas</th>
       <th>Actualizar</th>
       <th>Editar Telefono</th>
    </tr>
    </thead>
 
    <tbody>
    @if($orders)
        @foreach($orders as $order)

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@updatecontact', $order->pedidos_id]]) !!}

            <tr height="80">
             <td>{!!Form::label('fecha', date('d/m/y H:i', strtotime($order->fecha)))!!}</td>
             <td>{!!Form::label('nombre', $order->nombre)!!}</td>
             <td>{!!Form::label('telefono', $order->telefono)!!}</td>
             <td>{!!Form::label('titulo_publicacion', $order->titulo_publicacion)!!}</td>
             @if($order->fecha_cont)
                <td>{!!Form::label('fecha_cont', date('d/m H:i', strtotime($order->fecha_cont)))!!}</td>
             @else
                <td></td>
             @endif
             <td>{!!Form::select('contacto', config('options.contacto'), $order->contacto)!!}</td>
             <td>{!!Form::submit('Cargar')!!}</td>
             <td><input type ='button' class="btn btn-warning"  value = 'Editar' onclick="location.href = '{{ route('orders.phoneedit', $order->pedidos_id) }}'"/></th>
            </tr>

        {!! Form::close() !!}

        @endforeach
    @endif
    </tbody>
</table>
</div>

@endsection

@section("pie")


@endsection