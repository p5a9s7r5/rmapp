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
                
                float:center;
                padding:2px;
                cursor:pointer;
                display:block;
                width:290px;
                margin:auto;
                text-align:left;
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
