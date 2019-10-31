@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('users.index', 'Regresar')}}
</div>

Modificar Usuarios

@endsection

@section("general")

{!! Form::model($user, ['method' => 'PUT', 'action' => ['AdminUsersController@update', $user->id]]) !!}

    {!!Form::token()!!}

    <table width="300">
        <tr>
        <td>{!!Form::label('nombre', 'Nombre:')!!}</td>
        <td>{!!Form::text('name')!!}</td>
        </tr>
        <tr>
        <td>{!!Form::label('email', 'Email:')!!}</td>
        <td>{!!Form::text('email')!!}</td>
        </tr>
        <tr>
        <td>{!!Form::label('acceso', 'Acceso:')!!}</td>
        <td>{!!Form::select('acceso', ['admin' => 'Admin', 'operaciones' => 'Operaciones', 'ventas' => 'Ventas'], 'ventas')!!}</td>
        </tr>
        <tr>
        <td>{!!Form::submit('Actualizar')!!}</td>
        <td>{!!Form::reset('Limpiar')!!}</td>
        </tr>
    </table>

{!! Form::close() !!}

@endsection