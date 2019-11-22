@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.payments', 'Volver')}}
</div>

Editar Envio 

@endsection


@section("general")

        <table id="tabla2">
        <tr height="50">
            <h2>Cliente</h2>
            <th>Seudonimo:</th>
            <td>{{$order->seudonimo}}</td>
            <th>Nombre:</th>
            <td>{{$order->nombre}}</td>
        </tr>
        </table><br/><br/>
        <h2>Datos de Envio</h2>

    {!! Form::model($envio, ['method' => 'PUT', 'action' => ['AdminOrdersController@updateship', $envio->id]]) !!}
  
    <table id="tabla2" >
    <tr>
       <th>{!!Form::label('despacho', 'Empresa Envio', ['class' => 'textarea2'])!!}</th>
       <td>{!!Form::select('despacho', config('options.despachos'), $pago->despacho, ['required'=>'required', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('pedidos_id', $order->pedidos_id)!!}
    </tr>
    <tr>
       <th>{!!Form::label('nombre', 'Nombre Destinatario')!!}</th>
       <td>{!!Form::text('nombre', $envio->nombre, ['required'=>'required','class' => 'textarea2'])!!}</td>
    </tr>
    <tr>
       <th>{!!Form::label('cedula', 'Nro Cedula')!!}</th>
       <td>{!!Form::text('cedula', $envio->cedula, ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr>
       <th>{!!Form::label('telefono', 'Telefono')!!}</th>
       <td>{!!Form::text('telefono', $envio->telefono, ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr>
       <th>{!!Form::label('direccion', 'Direccion')!!}</th>
       <td>{!!Form::textarea('direccion', $envio->direccion, ['required'=>'required', 'rows' => 5, 'cols' => 55])!!}</td>
    </tr>
    <tr>
       <th>{!!Form::label('ciudad', 'Ciudad / Estado')!!}</th>
       <td>{!!Form::text('ciudad', $envio->ciudad, ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    </table><br/>
    
    <div>
    <table style="margin: 0 auto;">
        <tr height="50">
            <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
            <th>{!!Form::reset('Limpiar')!!}</th>
            <td>{!!Form::submit('Aceptar')!!}</td>
        </tr>
    </table>

{!! Form::close() !!}

    </div><br/><br/>


@endsection

@section("pie")


@endsection