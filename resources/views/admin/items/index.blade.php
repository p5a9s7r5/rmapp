@extends("layouts.plantilla")

@section("cabecera")

Administrador Articulos Profit

@endsection


@section("general")

<table style="margin: 0 auto;">
<nav>
        {!! Form::model(Request::all(), ['action' => 'AdminItemsController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
    <th>{!! Form::label('stock', 'Stock activo') !!}</th>
    <th>{!! Form::checkbox('stock', 'stock', true) !!}</th>
    <th>{!! Form::text('busqueda', null, ['class' => 'buscador', 'placeholder' => 'Busqueda']) !!}</th>
    <th>{!! Form::submit('Buscar', ['class' => 'buscador']) !!}</th>
        {!! Form::close() !!}
</nav>
</table> <br/>


<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Id</th>
       <th>Codigo Profit</th>
       <th>Titulo</th>
       <th>Stock Disponible</th>
       <th>Ventas Activas</th>
       <th>Precio</th>
       <th>Codigo ML3</th>
       <th>Codigo ML4</th>
       <th>Datos</th>
    </tr>
    </thead>
 
    <tbody>
    @if($items)
        @foreach($items as $item)
            <tr height="50">
             <td>{{$item->id}}</td>
             <td>{{$item->codigo_profit}}</td>
             <td>{{$item->titulo}}</td>
             <td>{{$item->stock_disponible}}</td>
             <td>{{$item->vendidos_ml}}</td>
             <td>{{$item->precio}}</td>
             <td>{{$item->ml3}}</td>
             <td>{{$item->ml4}}</td>
             <td>{{link_to_route('items.show', 'Ver Datos', $item->id)}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>

@endsection

@section("pie")

{{ $items->appends(Request::all())->render() }}

@endsection