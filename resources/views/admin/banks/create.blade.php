@extends("layouts.plantilla")

@section("cabecera")

Ingresar Estados de Cuenta

@endsection


@section("general")

{!! Form::open(['url' => '/admin/banks' , 'method' => 'post', 'files' => true]) !!}

<table width="500" style="margin: 0 auto;">

    <tr height="50">
        <th>{!!Form::label('id', 'Insertar Archivo Excel: ')!!}</th>
        <td>{!!Form::file('file')!!}</td>
    </tr>
    <tr height="50">
        <th>{!!Form::label('fecha', 'Fecha: ')!!}</th>
        <td>{!! Form::date('fecha', now())!!}</td>
    </tr>
    <tr height="50">
        <td>{!!Form::reset('Borrar')!!}</td>
        <td>{!!Form::submit('Insertar')!!}</td>
    </tr>
</table>
    {!! Form::close() !!}
    



@endsection
