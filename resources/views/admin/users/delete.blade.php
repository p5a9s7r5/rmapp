@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('users.index', 'Regresar')}}
</div>

Eliminar Usuario

@endsection

@section("general")

{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

        {!!Form::token()!!}

<table width="300" border="1">
        <tr>
        <td>Id:</td>
        <td>{{$user->id}}</td>
        </tr>
        <tr>
        <td>Nombre:</td>
        <td>{{$user->name}}</td>
        </tr>
        <tr>
        <td>Email:</td>
        <td>{{$user->email}}</td>
        </tr>
        <tr>
        <td>Acceso:</td>
        <td>{{$user->acceso}}</td>
        </tr>
</table>
        <br>

        {!!Form::submit('Eliminar')!!}

        {!! Form::close() !!}

@endsection