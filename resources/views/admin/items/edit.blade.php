@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Editar Articulo</h1>

{!! Form::model($item, ['method' => 'PUT', 'action' => ['AdminItemsController@update', $item->id]]) !!}

<table id="tabla2">

    <tr height="50">
       <th width="30%">{!!Form::label('id', 'Id: ')!!}</th>
       <td>{!!Form::text('codigo_profit', $item->id, ['class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('titulo', 'Titulo Profit: ')!!}</th>
       <td >{!!Form::text('titulo', $item->titulo, ['class' => 'textarea3'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('nombre_ml', 'Titulo ML: ')!!}</th>
       <td>{!!Form::text('nombre_ml', $item->nombre_ml, ['class' => 'textarea3'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('codigo_profit', 'Codigo Profit: ')!!}</th>
       <td>{!!Form::text('codigo_profit', $item->codigo_profit, ['class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ml3', 'Codigo ML3: ')!!}</th>
       <td>{!!Form::text('ml3', $item->ml3, ['class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ml5', 'Variante ML3: ')!!}</th>
       <td>{!!Form::text('ml5', $item->ml5, ['class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ml4', 'Codigo ML4: ')!!}</th>
       <td>{!!Form::text('ml4', $item->ml4, ['class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('variante_ml4', 'Variante ML4: ')!!}</th>
       <td>{!!Form::text('variante_ml4', $item->variante_ml4, ['class' => 'textarea2'])!!}</td>
    </tr>
    
</table><br/>

<div>
<table style="margin: 0 auto;">

<tr height="50">
   <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
   <td>{!!Form::reset('Limpiar')!!}</td>
   <td>{!!Form::submit('Actualizar')!!}</td>
</tr>

</table>

{!! Form::close() !!}

</div>

@endsection
