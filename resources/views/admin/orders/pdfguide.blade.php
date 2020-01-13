<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guia de Envio</title>

    <style>

        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 25px;
        }

        h2 {text-align: center}

        .head {
            font-size: 15px;
            height: 50vh;
            align-items: center;
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .volver {
            position: absolute;
            right: 10px;
            top: 18px;
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
        }

        #tabla {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 15px;
            border-collapse: collapse;
            width: 100%;
            margin: auto;}
            #tabla td, #tabla th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;}
            #tabla tr:nth-child(even){background-color: #f2f2f2;}
            #tabla tr:hover {background-color: #ddd;}
            #tabla th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: right;
                background-color: #4CAF50;
                color: white;}

        img{
            display:block;
            float:center;
            width:250px;
        }

        .regresar {
                color: #636b6f;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

    </style>


</head>

<body>

    <h3 class="volver">  J-31172431-1  </h3>

    <img src={{asset("/images/logo.jpg")}} class="imgcabecera">

<br/><br/><br/><br/>

<h2>  GUIA DE ENVIO  </h2>

<table id="tabla">
    <tr height="50">
       <th width="17%">Nombre:</th>
       <td>{{$order->destinatario}}</td>
    </tr>
    <tr height="50">
       <th>Cedula:</th>
       <td>{{$order->cedula}}</td>
    </tr>
    <tr height="50">
       <th>Telefono:</th>
       <td>{{$order->telefono}}</td>
    </tr>
    <tr height="50">
       <th>Ciudad:</th>
       <td>{{$order->ciudad_envio}}</td>
    </tr>
    <tr height="200">
       <th>Direccion:</th>
       <td>{{$order->direccion_envio}}</td>
    </tr>
</table><br/><br/>

<table id="tabla">
    <tr height="50">
       <th width="17%">Empresa:</th>
       <td>{{$order->despacho}}</td>
       <th width="17%">Fecha:</th>
       <td><?=date('d/m/Y g:ia');?></td>
    </tr>
    <tr height="50">
       <th >Factura:</th>
       <td>{{$order->factura_profit}}</td>
       <th>Monto:</th>
       <td>{{number_format($order->monto_pago,0, ",", ".")}}</td>
    </tr>
</table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<table id="tabla">
    <tr height="50">
       <td width="17%">Nombre ML:</td>
       <td>{{$order->nombre}}</td>
    </tr>
    <tr height="50">
       <td>Articulo Ofertado:</td>
       <td>{{$order->titulo_publicacion}}</td>
    </tr>
    <tr height="50">
       <td>Articulo segun Cliente:</td>
       <td>{{$order->articulo_cliente}}</td>
    </tr>
    <tr height="50">
       <td>Otros Articulos:</td>
       <td>{{$order->otros_articulos}}</td>
    </tr>
    <tr height="50">
       <td>Total Articulos:</td>
       <td>{{$order->cantidad_cliente}}</td>
    </tr>
</table><br/><br/><br/>

<div class="regresar">
    {{link_to_route('orders.shipping', '< Volver')}}
</div>

</body>
</html>
