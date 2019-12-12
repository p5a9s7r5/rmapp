@extends("layouts.plantilla")

@section("cabecera")

@endsection


@section("general")

<h1>Datos Generales</h1><br/><br/>

<table id="tabla2">
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

</table><br/>

<table style="margin: 0 auto;">
   <tr height="65">
      <td><button type="button" onclick="history.back();" class="inputbutton">Volver</button></td>
      <td><input type ='button' class="btn btn-warning"  value = 'Modificar' onclick="location.href = '{{ route('users.edit', $user->id) }}'"/></td>
   </tr>
</table>

@endsection
