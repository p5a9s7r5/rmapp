@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("navbar")

@endsection

@section("general")

<h1>Administrador Articulos Profit</h1>

<table style="margin: 0 auto;">
<nav>
        {!! Form::model(Request::all(), ['action' => 'AdminItemsController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
    <th>{!! Form::label('stock', 'Stock activo') !!}</th>
    <th>{!! Form::checkbox('stock', 'stock', false) !!}</th>
    <th width="10%"></th>
    <th width="50%">{!! Form::text('busqueda', null, ['class' => 'buscador', 'placeholder' => 'Busqueda']) !!}</th>
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
             <td>{{number_format($item->precio*$tasa->valor,2, ",", ".")}}</td>
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