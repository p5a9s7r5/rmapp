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
                height: 40vh;
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

            form {
                padding:10px;
                cursor:pointer;
                display:block;
                margin:auto;
                text-align:left;
            }

            .textarea0[type=text] {
                width: 60px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea0[type=text]:focus {
                background-color: lightblue;}

            .textarea1[type=text] {
                width: 120px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea1[type=text]:focus {
                background-color: lightblue;}

            .textarea2[type=text] {
                width: 180px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea2[type=text]:focus {
                background-color: lightblue;}

            .textarea3[type=text] {
                width: 400px;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                outline: none;}
            .textarea2[type=text]:focus {
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
                border: none;
                width: 385px;
                padding: 10px 10px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
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

            <br/><br/><br/><br/><br/><br/>

        </div>

    </body>
</html>
