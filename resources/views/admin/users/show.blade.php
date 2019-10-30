@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('users.index', 'Regresar')}}
</div>

Datos Generales

@endsection


@section("general")

<table width="600" border="1">
    <tr>
       <th width="50">Id</th>
       <th width="200">Nombre</th>
       <th width="250">Email</th>
       <th>Acceso</th>
    </tr>

    <tr>
     <td>{{$user->id}}</td>
     <td>{{$user->name}}</td>
     <td>{{$user->email}}</td>
     <td>{{$user->acceso}}</td>
    </tr>

</table>

@endsection
