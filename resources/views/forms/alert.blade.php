@extends("layouts.plantilla")

@section("cabecera")

<img src="/images/logo.jpg" class="imgcabecera">

@endsection


@section("general")

<div class="informacion">

@if($order->estatus == 'Pago Registrado' or $order->estatus == 'Pago Verificado')

<table>
    <tr height="50">
       <th>Hola {{$order->nombre}}, ya recibimos tu registro con anterioridad</th>
    </tr>
    <tr height="50">
       <th>Puede retirar por nuestra tienda de lunes a viernes de 9am a 12pm y 1pm a 4pm</th>
    </tr>
    <tr height="25">
       <br/>
    </tr>
    <tr height="50">
       <td>En caso que desee el pedido por envío, por favor favor escribamos por la mensajeria de Mercadolibre para indicarle los pasos a seguir</td>
    </tr>
</table>

@endif

@if($order->estatus == 'Envio Registrado' or $order->estatus == 'Envio Aprobado' or $order->estatus == 'Envio Procesado' or $order->estatus == 'Enviado')

<table>
    <tr height="50">
       <th>Hola {{$order->nombre}}, ya recibimos tu registro con anterioridad</th>
    </tr>
    <tr height="50">
       <th>Por favor esté atento a la mensajería de Mercadolibre que por allí le estaremos enviando las notificaciones</th>
    </tr>
    <tr height="25">
       <br/>
    </tr>
    <tr height="50">
       <td>Recuerde que si realizo el registro después de la 1pm lo estamos procesando el siguiente dia habil</td>
    </tr>
    <tr height="50">
       <td>Cualquier duda o consulta nos escribe por la mensajería de Mercadolibre y le estaremos respondiendo a la brevedad posible</td>
    </tr>
</table>

@endif

</div>

@endsection

@section("pie")


@endsection