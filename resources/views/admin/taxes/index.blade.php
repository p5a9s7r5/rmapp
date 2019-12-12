@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Administrador Tasas</h1><br/><br/>

<table id="tabla3">
    <tr height="50">
       <th>Nombre</th>
       <th>Valor</th>
       <th width="25%">Actualizar</th>
    </tr>

    @foreach($tasas as $tasa)

        {!! Form::model($tasa, ['method' => 'PUT', 'action' => ['AdminTaxesController@update', $tasa->id]]) !!}

            <tr height="50">
             <th>{!!Form::label('nombre', $tasa->nombre)!!}</th>
             <td>{!!Form::text('valor',$tasa->valor, ['class' => 'textarea1'])!!}</td>
             <td>{!!Form::submit('Actualizar')!!}</td>
            </tr>

        {!! Form::close() !!}

    @endforeach

</table>

@endsection

@section("pie")

@endsection