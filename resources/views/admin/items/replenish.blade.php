@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("navbar")

@endsection

@section("general")

<h1>Reposicion de Inventario</h1><br/><br/>

<div>
<table id="tabla1">
    <thead>
    <tr height="50">
        <th>Stock Reposicion</th>
        <th>Titulo</th>
        <th>Stock Actual</th>
        <th>Stock Disponible</th>
        <th>Ventas Activas</th>
        <th>Costo</th>
        <th>Codigo Profit</th>
    </tr>
    </thead>
 
    <tbody>
    {!! Form::open(['method' => 'post', 'action' => 'AdminItemsController@buy']) !!}

        @foreach($items as $item)
            <tr height="50">
                    {!! Form::hidden('id[]', $item->id) !!}
                <td>{!! Form::text('stock_reponer[]', $item->stock_reponer, ['class' => 'textarea0']) !!}</td>
                <td>{!! Form::label(substr($item->titulo, 0, 45)) !!}</td>
                    {!! Form::hidden('titulo[]', $item->titulo) !!}
                <td>{!! Form::label($item->stock_general) !!}</td>
                <td>{!! Form::label($item->stock_disponible) !!}</td>
                <td>{!! Form::label($item->vendidos_ml) !!}</td>
                <td>{!! Form::label(number_format($item->precio/1000,2)) !!}$</td>
                <td>{!! Form::label($item->codigo_profit) !!}</td>
            </tr>
        @endforeach

</table><br/><br/>

<table style="margin: 0 auto;">

    <tr height="50">
        <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
        <td>{!!Form::reset('Limpiar')!!}</td>
        <td>{!!Form::submit('Confirmar')!!}</td>
    </tr>
    
    {!! Form::close() !!}
    </tbody>
</table>
</div>

@endsection

@section("pie")

@endsection