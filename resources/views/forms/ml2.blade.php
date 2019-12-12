@extends("layouts.plantillaforms")

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
       <th>{!!Form::label('destinatario', 'Nombre Destinatario')!!}</th>
       <td>{!!Form::text('destinatario', session()->get('destinatario'), ['required'=>'required', 'maxlength'=> 40, 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('cedula', 'Nro Cedula')!!}</th>
       <td>{!!Form::text('cedula', session()->get('cedula'), ['required'=>'required', 'maxlength'=> 15, 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('telefono', 'Telefono')!!}</th>
       <td>{!!Form::text('telefono', session()->get('telefono'), ['required'=>'required', 'maxlength'=> 25, 'class' => 'textarea2'])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('direccion_envio', 'Direccion')!!}</th>
       <td>{!!Form::textarea('direccion_envio', session()->get('direccion_envio'), ['required'=>'required', 'maxlength'=> 300, 'rows' => 5, 'cols' => 55])!!}</td>
    </tr>
    <tr height="50">
       <th>{!!Form::label('ciudad_envio', 'Ciudad / Estado')!!}</th>
       <td>{!!Form::text('ciudad_envio', session()->get('ciudad_envio'), ['required'=>'required', 'maxlength'=> 30, 'class' => 'textarea2'])!!}</td>
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
