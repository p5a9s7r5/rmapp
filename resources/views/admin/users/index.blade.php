@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("general")

<h1>Administrador Usuarios</h1><br/><br/>

<table id="tabla1">
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
             <td><input type ='button' class="btn btn-warning"  value = 'Ver Datos' onclick="location.href = '{{ route('users.show', $user->id) }}'"/></td>
             <td><input type ='button' class="btn btn-warning"  value = 'Modificar' onclick="location.href = '{{ route('users.edit', $user->id) }}'"/></td>
             <td><input type ='button' class="btn btn-warning"  value = 'Eliminar' onclick="location.href = '{{ route('users.delete', $user->id) }}'"/></td>
            </tr>
        @endforeach
    @endif
</table>

@endsection
