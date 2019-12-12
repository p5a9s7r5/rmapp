@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("navbar")

@endsection

@section("general")

<h1>Reposicion de Inventario</h1><br/><br/>

<div>
<table id="tabla2">
    <thead>
    <tr height="50">
        <th>Stock Reposicion</th>
        <th>Titulo</th>
    </tr>
    </thead>

    {!! Form::open(['method' => 'post', 'action' => 'AdminItemsController@confirmbuy']) !!}
 
    @foreach($items as $item)
            <tr height="50">
                    {!! Form::hidden('id[]', $item['id']) !!}
                <td>{{$item['stock_reponer']}}</td>
                <td>{{$item['titulo']}}</td>
            </tr>
    @endforeach
</table>

<table style="margin: 0 auto;">

    <tr height="50">
        <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
        <td>{!!Form::submit('Finalizar')!!}</td>
    </tr>
    
    {!! Form::close() !!}
</div>

@endsection

@section("pie")

@endsection