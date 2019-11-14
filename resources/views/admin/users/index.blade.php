@extends("layouts.plantilla")

@section("cabecera")

Administrador Usuarios

@endsection


@section("general")

<table width="1000" border="1" style="margin: 0 auto;">
    <tr height="50">
       <th width="50">Id</th>
       <th width="200">Nombre</th>
       <th width="250">Email</th>
       <th>Acceso</th>
       <th>Datos</th>
       <th>Actualizar</th>
       <th>Eliminar</th>
    </tr>
 
    @if($users)
        @foreach($users as $user)
            <tr height="50">
             <td>{{$user->id}}</td>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->acceso}}</td>
             <td>{{link_to_route('users.show', 'Ver Datos', $user->id)}}</td>
             <td>{{link_to_route('users.edit', 'Modificar Usuario', $user->id)}}</td>
             <td><a href="users/{{$user->id}}/delete">Eliminar Usuario</a></td>
            </tr>
        @endforeach
    @endif
</table>

@endsection
