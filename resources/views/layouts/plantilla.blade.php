<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plantilla</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .cabecera {
                font-size: 50px;
                align-items: center;
                display: flex;
                justify-content: center;
                margin-bottom: 30px;
            }

            .general {
                color: #636b6f;
                padding: 0 25px;
                font-size: 15px;
                font-weight: 500;
                text-decoration: none;
                text-align: center;
                align-items: center;
                display: inline;
                justify-content: center;
                margin-bottom: 50px;
            }

            .pie > {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                text-decoration: none;
                text-align: center;
                height: 50vh;
                margin-bottom: 40px;
                display: flex;
                justify-content: center;
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

            .pagination {
                display: inline-block;
                padding-left: 40;
                margin: 10px 0;
                border-radius: 50px;
                margin-left: 140px;
            }

            .pagination > li {
                display: inline;
            }

            .pagination > li > a,
            .pagination > li > span {
                position: relative;
                float: left;
                padding: 6px 12px;
                margin-left: -1px;
                line-height: 1.428571429;
                color: #428bca;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #ddd;
            }

            .pagination > li:first-child > a,
            .pagination > li:first-child > span {
                margin-left: 0;
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
            }

            .pagination > li:last-child > a,
            .pagination > li:last-child > span {
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
            }

            .pagination > li > a:hover,
            .pagination > li > span:hover,
            .pagination > li > a:focus,
            .pagination > li > span:focus {
                color: #2a6496;
                background-color: #eee;
                border-color: #ddd;
            }

            .pagination > .active > a,
            .pagination > .active > span,
            .pagination > .active > a:hover,
            .pagination > .active > span:hover,
            .pagination > .active > a:focus,
            .pagination > .active > span:focus {
                z-index: 2;
                color: #fff;
                cursor: default;
                background-color: #428bca;
                border-color: #428bca;
            }

            .pagination > .disabled > span,
            .pagination > .disabled > span:hover,
            .pagination > .disabled > span:focus,
            .pagination > .disabled > a,
            .pagination > .disabled > a:hover,
            .pagination > .disabled > a:focus {
                color: #999;
                cursor: not-allowed;
                background-color: #fff;
                border-color: #ddd;
            }

            form {
                padding:10px;
                cursor:pointer;
                display:block;
                margin:auto;
                text-align:left;
            }

            .textarea0[type=text] {
                width: 60px;
                padding: 12px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea0[type=text]:focus {
                background-color: lightblue;}

            .textarea1[type=text] {
                width: 120px;
                padding: 12px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea1[type=text]:focus {
                background-color: lightblue;}

            .textarea2[type=text] {
                width: 180px;
                padding: 12px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea2[type=text]:focus {
                background-color: lightblue;}

            .textarea3[type=text] {
                width: 400px;
                padding: 12px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea3[type=text]:focus {
                background-color: lightblue;}

            .informacion {
                font-size: 20px;
                height: 30vh;
                align-items: center;
                display: flex;
                justify-content: center;
                margin-bottom: 30px;
            }

            .imgcabecera {
                float:center;
                width:400px;
            }

            #tabla1 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 80%;
                margin: auto;}
                #tabla1 td, #tabla1 th {
                    border: 1px solid #ddd;
                    padding: 8px;}
                #tabla1 tr:nth-child(even){background-color: #f2f2f2;}
                #tabla1 tr:hover {background-color: #ddd;}
                #tabla1 th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;}

            #tabla2 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 650px;
                margin: auto;}
                #tabla2 td, #tabla2 th {
                    border: 1px solid #ddd;
                    padding: 8px;}
                #tabla2 tr:nth-child(even){background-color: #f2f2f2;}
                #tabla2 tr:hover {background-color: #ddd;}
                #tabla2 th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;}

            #tabla3 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 40%;
                margin: auto;}
                #tabla3 td, #tabla3 th {
                    border: 1px solid #ddd;
                    padding: 8px;}
                #tabla3 tr:nth-child(even){background-color: #f2f2f2;}
                #tabla3 tr:hover {background-color: #ddd;}
                #tabla3 th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: center;
                    background-color: #4CAF50;
                    color: white;}

            #tabla4 {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                font-size: 20px;
                border-collapse: collapse;
                width: 70%;
                margin: auto;}
                #tabla4 td, #tabla4 th {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;}
                #tabla4 tr:nth-child(even){background-color: #f2f2f2;}
                #tabla4 tr:hover {background-color: #ddd;}
                #tabla4 th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: right;
                    background-color: #4CAF50;
                    color: white;}

            #tabla5{
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                border-spacing: 0;
                width: 60%;
                border: 1px solid #ddd;
                margin: auto;}
                #tabla5 th, #tabla5td {
                    text-align: center;
                    padding: 16px;}
                #tabla5 tr:nth-child(even) {
                    background-color: #f2f2f2}

            input[type=button], input[type=submit], input[type=reset] {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 10px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }

            .inputbutton {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 10px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }

            input[type=email] {
                width: 385px;
                padding: 12px 10px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }

            input[type=date] {
                background: transparent;
                border: none;
                font-size: 14px;
                height: 30px;
                padding: 5px;
                width: 165px;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
            }

            input[type=number] {
                width: 180px;
                padding: 12px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;
            }

            select {
                background: transparent;
                border: none;
                font-size: 14px;
                height: 37px;
                padding: 5px;
                width: 180px;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
            }

            input[type=checkbox] {
                position: relative;
	            cursor: pointer;
            }
            input[type=checkbox]:before {
                content: "";
                display: block;
                position: absolute;
                width: 16px;
                height: 16px;
                top: 0;
                left: 0;
                border: 2px solid #4CAF50;
                border-radius: 3px;
                background-color: white;
            }
            input[type=checkbox]:checked:after {
                content: "";
                display: block;
                width: 5px;
                height: 10px;
                border: solid #4CAF50;
                border-width: 0 2px 2px 0;
                -webkit-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
                position: absolute;
                top: 2px;
                left: 6px;
            }

            .buscador{
                width: 95%;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                background-image: url('searchicon.png');
                background-position: 10px 10px; 
                background-repeat: no-repeat;
                padding: 8px 8px 8px 8px;
            }

            .navbar {
                overflow: hidden;
                background-color: #464646;
                width: 80%;
                align-items: center;
                margin: auto;
                margin-bottom: 40px;
            }
            .navbar a {
                float: left;
                font-size: 20px;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            .subnav {
                float: left;
                overflow: hidden;
            }
            .subnav .subnavbtn {
                font-size: 20px;  
                border: none;
                outline: none;
                color: white;
                padding: 14px 16px;
                background-color: inherit;
                font-family: inherit;
                margin: 0;
            }
            .navbar a:hover, .subnav:hover .subnavbtn {
                background-color: #4CAF50;
            }
            .subnav-content {
                display: none;
                position: absolute;
                left: 10%;
                background-color: #4CAF50;
                width: 80%;
                z-index: 1;
                align-items: center;
                justify-content: center;
                margin: auto;
            }
            .subnav-content a {
                float: left;
                color: white;
                text-decoration: none;
            }
            .subnav-content a:hover {
                background-color: #eee;
                color: black;
            }
            .subnav:hover .subnav-content {
                display: block;
            }
            .navbar a.active {
                background-color: #4CAF50;
                color: white;
            }

        </style>
    </head>
    <body>
        
        <div class="cabecera">

            @yield("cabecera")

        </div>

        <div class="navbar">

            @yield("navbar")

                <a href={{ route("admin") }}>Inicio</a>
                <div class="subnav">
                    <button class="subnavbtn">Articulos <i class="fa fa-caret-down"></i></button>
                        <div class="subnav-content">
                            <a href={{ route("items.index") }}>Articulos</a>
                            <a href={{ route("items.replenish") }}>Reposicion Stock</a>
                        </div>
                </div> 
                <div class="subnav">
                    <button class="subnavbtn">Pedidos <i class="fa fa-caret-down"></i>	</button>
                        <div class="subnav-content">
                            <a href={{ route("orders.index") }}>Pedidos</a>
                            <a href={{ route("orders.contact") }}>Por Contactar</a>
                            <a href={{ route("orders.aprofit") }}>Cargar Profit</a>
                            <a href={{ route("orders.create") }}>Listado Profit</a>
                        </div>
                </div> 
                <div class="subnav">
                    <button class="subnavbtn">Envios <i class="fa fa-caret-down"></i>	</button>
                        <div class="subnav-content">
                            <a href={{ route("orders.shipping") }}>Pedidos por Enviar</a>
                            <a href={{ route("orders.guides") }}>Guias por Cargar</a>
                        </div>
                </div> 
                <div class="subnav">
                    <button class="subnavbtn">Bancos <i class="fa fa-caret-down"></i></button>
                        <div class="subnav-content">
                            <a href={{ route("banks.index") }}>Estados de Cuenta</a>
                            <a href={{ route("banks.create") }}>Cargar Bancos</a>
                            <a href={{ route("orders.payments") }}>Pagos por Verificar</a>
                        </div>
                </div> 
                <a href={{ route("taxes.index") }}>Tasas</a>
                <div class="subnav">
                    <button class="subnavbtn">Usuarios <i class="fa fa-caret-down"></i>	</button>
                        <div class="subnav-content">
                            <a href={{ route("users.index") }}>Usuarios</a>
                            <a href={{ route("payroll.index") }}>Control de Asistencia</a>
                            <a href={{ route("payroll.create") }}>Cargar Asistencia</a>
                        </div>
                </div>

        </div>

        <div class="general">

            @yield("general")

        </div>

        <div class="pie">

            @yield("pie")

            <br/><br/><br/><br/><br/><br/>

        </div>

    </body>
</html>
