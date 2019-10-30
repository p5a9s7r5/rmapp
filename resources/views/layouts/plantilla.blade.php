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
                height: 50vh;
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
                display: flex;
                justify-content: center;
            }

            .pie > {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                text-decoration: none;
                text-align: center;
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

        </style>
    </head>
    <body>
        
        <div class="cabecera">

        @yield("cabecera")

        </div>

        <div class="general">

        @yield("general")

        </div>

        <div class="pie">

        @yield("pie")

        </div>

    </body>
</html>
