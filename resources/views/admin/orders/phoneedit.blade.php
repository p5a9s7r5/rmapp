@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Editar Telefono</h1><br/><br/>

    {!! Form::model($order, ['method' => 'PUT', 'action' => ['AdminOrdersController@updatephone', $order->pedidos_id]]) !!}
  
    <table id="tabla2" >
    <tr height="80">
        <th>Seudonimo:</th>
        <td>{{$order->seudonimo}}</td>
        {!!Form::hidden('pedidos_id', $order->pedidos_id)!!}
    </tr>
    <tr height="80">
        <th>Nombre:</th>
        <td>{{$order->nombre}}</td>    
    </tr>
    <tr height="80">
        <th>Articulo:</th>
        <td>{{$order->titulo_publicacion}}</td>    
    </tr>
    <tr height="80">
       <th>{!!Form::label('telefono', 'Telefono')!!}</th>
       <td>{!!Form::text('telefono', $order->telefono, ['required'=>'required', 'class' => 'textarea3'])!!}</td>
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