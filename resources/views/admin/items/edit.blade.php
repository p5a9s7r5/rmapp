@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('items.show', 'Regresar', $item->id)}}
</div>

Editar Articulo

@endsection


@section("general")

{!! Form::model($item, ['method' => 'PUT', 'action' => ['AdminItemsController@update', $item->id]]) !!}

<table border="1" style="margin: 0 auto;">

    <tr height="50">
       <th>{!!Form::label('id', 'Id: ')!!}</th>
       <td>{!!Form::text('codigo_profit', $item->id)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('titulo', 'Titulo Profit: ')!!}</th>
       <td >{!!Form::text('titulo', $item->titulo)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('nombre_ml', 'Titulo ML: ')!!}</th>
       <td>{!!Form::text('nombre_ml', $item->nombre_ml)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('codigo_profit', 'Codigo Profit: ')!!}</th>
       <td>{!!Form::text('codigo_profit', $item->codigo_profit)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ml3', 'Codigo ML3: ')!!}</th>
       <td>{!!Form::text('ml3', $item->ml3)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ml5', 'Variante ML3: ')!!}</th>
       <td>{!!Form::text('ml5', $item->ml5)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ml4', 'Codigo ML4: ')!!}</th>
       <td>{!!Form::text('ml4', $item->ml4)!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('variante_ml4', 'Variante ML4: ')!!}</th>
       <td>{!!Form::text('variante_ml4', $item->variante_ml4)!!}</td>
    </tr>
    
</table>

<br/>

<div>
<table>

<tr height="50">
   <th>{!!Form::reset('Limpiar')!!}</th>
   <td>{!!Form::submit('Actualizar')!!}</td>
</tr>

</table>

{!! Form::close() !!}

</div>

@endsection
