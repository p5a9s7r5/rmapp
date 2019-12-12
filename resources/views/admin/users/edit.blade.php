@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Modificar Usuario</h1><br/><br/>

{!! Form::model($user, ['method' => 'PUT', 'action' => ['AdminUsersController@update', $user->id]]) !!}

    {!!Form::token()!!}

    <table id="tabla2">
        <tr>
        <th width="25%">{!!Form::label('nombre', 'Nombre:')!!}</th>
        <td>{!!Form::text('name', $user->name, ['class' => 'textarea3'])!!}</td>
        </tr>
        <tr>
        <th>{!!Form::label('email', 'Email:')!!}</th>
        <td>{!!Form::text('email', $user->email, ['class' => 'textarea3'])!!}</td>
        </tr>
        <tr>
        <th>{!!Form::label('acceso', 'Acceso:')!!}</th>
        <td>{!!Form::select('acceso', ['admin' => 'Admin', 'operaciones' => 'Operaciones', 'ventas' => 'Ventas'], 'ventas', ['class' => 'textarea3'])!!}</td>
        </tr>
    </table><br/>

<table style="margin: 0 auto;">
   <tr height="65">
      <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
      <td>{!!Form::reset('Limpiar')!!}</td>
      <td>{!!Form::submit('Actualizar')!!}</td>
   </tr>
</table>

{!! Form::close() !!}

@endsection