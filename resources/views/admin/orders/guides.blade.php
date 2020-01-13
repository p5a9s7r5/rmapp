@extends("layouts.plantilla")

@section("cabecera")

@endsection


@section("general")

<h1>Guias por Cargar</h1><br/><br/>

<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Fecha Guia</th>
       <th>Nombre</th>
       <th>Destinatario</th>
       <th>Ciudad / Estado</th>
       <th>Empresa Envio</th>
       <th>Guia</th>
       <th>Actualizar</th>
    </tr>
    </thead>
 
    <tbody>
    @if($orders)
        @foreach($orders as $order)

        {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@updateguide', $order->pedidos_id]]) !!}

            <tr height="50">
             <td>{!!Form::label('fecha_estatus', date('d/m/y H:i', strtotime($order->fecha_estatus)))!!}</td>
             <td>{!!Form::label('nombre', $order->nombre)!!}</td>
             <td>{!!Form::label('destinatario', $order->destinatario)!!}</td>
             <td>{!!Form::label('ciudad_envio', $order->ciudad_envio)!!}</td>
             <td>{!!Form::select('despacho', config('options.despachos'), $order->despacho)!!}</td>
             <td>{!!Form::text('guia_envio', $order->guia_envio, ['required'=>'required', 'class' => 'textarea2'])!!}</td>
             <td>{!!Form::submit('Cargar')!!}</td>
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