@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Eliminar Usuario</h1><br/><br/>

{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

<table id="tabla2">
        <tr>
        <th width="25%">Id:</th>
        <td>{{$user->id}}</td>
        </tr>
        <tr>
        <th>Nombre:</th>
        <td>{{$user->name}}</td>
        </tr>
        <tr>
        <th>Email:</th>
        <td>{{$user->email}}</td>
        </tr>
        <tr>
        <th>Acceso:</th>
        <td>{{$user->acceso}}</td>
        </tr>
</table><br>

<table style="margin: 0 auto;">
   <tr height="65">
      <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
      <td>{!!Form::submit('Eliminar')!!}</td>
   </tr>
</table>

        {!! Form::close() !!}

@endsection