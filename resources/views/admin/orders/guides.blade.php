@extends("layouts.plantilla")

@section("cabecera")

<div class="volver">
{{link_to_route('orders.index', 'Todos los Pedidos')}}
</div>

Guias por Cargar

@endsection


@section("general")


<div>
<table id="tabla1">
    <thead>
    <tr height="50">
       <th>Nombre</th>
       <th>Cedula</th>
       <th>Telefono</th>
       <th>Direccion</th>
       <th>Ciudad</th>
    </tr>
    </thead>
 
    <tbody>
    @if($envios)
        @foreach($envios as $envio)
            <tr height="50">
             <td>{{$envio->nombre}}</td>
             <td>{{$envio->cedula}}</td>
             <td>{{$envio->telefono}}</td>
             <td>{{$envio->direccion}}</td>
             <td>{{$envio->ciudad}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
</div>

@endsection

@section("pie")


@endsection