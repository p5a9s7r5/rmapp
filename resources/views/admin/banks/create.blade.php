@extends("layouts.plantilla")

@section("cabecera")

@endsection


@section("general")

<h1>Cargar Estados de Cuenta</h1><br/>

{!! Form::open(['url' => '/admin/banks' , 'method' => 'post', 'files' => true]) !!}

<table id="tabla3">

    <tr height="80">
        <th>{!!Form::label('id', 'Insertar Archivo Excel: ')!!}</th>
        <td>{!!Form::file('file')!!}</td>
    </tr>
    <tr height="80">
        <th>{!!Form::label('fecha', 'Fecha: ')!!}</th>
        <td>{!! Form::date('fecha', now())!!}</td>
    </tr>
</table>

<table width="380" style="margin: 0 auto;">
    <tr height="100">
        <td>{!!Form::reset('Borrar')!!}</td>
        <td>{!!Form::submit('Insertar')!!}</td>
    </tr>
</table>
    {!! Form::close() !!}
    
@endsection
