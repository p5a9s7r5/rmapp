@extends("layouts.plantilla")

@section("cabecera")

Formulario de Envio

@endsection


@section("general")


{!! Form::open(['method' => 'post', 'action' => 'FormsController@confirmship']) !!}

<table id="tabla2">

    <tr height="50">
       <th>{!!Form::label('despacho', 'Empresa Envio')!!}</th>
       <td>{!!Form::text('despacho', session()->get('despacho'), ['disabled' => 'disabled', 'class' => 'textarea2'])!!}</td>
           {!!Form::hidden('despacho', session()->get('despacho'))!!}
    </tr>
    <tr height="50">
       <th>{!!Form::label('nombre', 'Nombre Destinatario')!!}</th>
       <td>{!!Form::text('nombre', session()->get('nombre'), ['required'=>'required','class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('cedula', 'Nro Cedula')!!}</th>
       <td>{!!Form::text('cedula', session()->get('cedula'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('telefono', 'Telefono')!!}</th>
       <td>{!!Form::text('telefono', session()->get('telefono'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('direccion', 'Direccion')!!}</th>
       <td>{!!Form::textarea('direccion', session()->get('direccion'), ['required'=>'required', 'rows' => 5, 'cols' => 55])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ciudad', 'Ciudad / Estado')!!}</th>
       <td>{!!Form::text('ciudad', session()->get('ciudad'), ['required'=>'required', 'class' => 'textarea2'])!!}</td>
    </tr>
</table>
<br/>
<div>

<table style="margin: 0 auto;">

<tr height="50">
   <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
   <th>{!!Form::reset('Limpiar')!!}</th>
   <td>{!!Form::submit('Aceptar')!!}</td>
</tr>

</table>

{!! Form::close() !!}

</div>
<br/><br/>

@endsection
