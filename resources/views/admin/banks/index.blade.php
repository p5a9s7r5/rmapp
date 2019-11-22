@extends("layouts.plantilla")

@section("cabecera")

Estados de Cuenta

@endsection


@section("general")

<table style="margin: 0 auto;">
<nav>
<tr height="50">
        {!! Form::model(Request::all(), ['action' => 'AdminBanksController@index', 'method' => 'GET', 'class' => 'form-inline']) !!}
    <th>{!! Form::label('fecha1', 'Desde: ') !!}</th>
    <th>{!! Form::date('fecha1', '')!!}</th>
    <th>{!! Form::label('fecha2', 'Hasta: ') !!}</th>
    <th>{!! Form::date('fecha2', now())!!}</th>
    <th>{!! Form::label('tipo', 'Tipo: ') !!}</th>
    <th>{!! Form::select('tipo', ['' => 'Seleccione', 'Entrada' => 'Entrada', 'Salida' => 'Salida']) !!}</th>
    <th>{!! Form::label('banco', 'Banco: ') !!}</th>
    <th>{!! Form::select('banco', config('options.bancos'), '') !!}</th>
</tr>
<tr height="50">
    <th colspan="1"></th>
    <th colspan="3">{!! Form::text('busqueda', null, ['class' => 'buscador', 'placeholder' => 'Busqueda']) !!}</th>
    <th colspan="2">{!! Form::submit('Buscar', ['class' => 'buscador']) !!}</th>
    <th colspan="1"></th>
        {!! Form::close() !!}
</tr>
</nav>
</table> <br/>


<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Fecha</th>
       <th>Banco</th>
       <th>Descripcion</th>
       <th>Referencia</th>
       <th>Monto</th>
       <th>Tipo</th>
    </tr>
    </thead>
 
    <tbody>
    @foreach($lines as $line)
            <tr height="50">
             <td>{{$line->fecha}}</td>
             <td>{{$line->banco}}</td>
             <td>{{$line->descripcion}}</td>
             <td>{{$line->referencia}}</td>
             <td>{{$line->monto}}</td>
             <td>{{$line->tipo}}</td>
            </tr>
    @endforeach
    </tbody>
</table>
</div>

@endsection

@section("pie")

{{ $lines->appends(Request::all())->render() }}

@endsection