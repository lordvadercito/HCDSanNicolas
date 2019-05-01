<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Expedient Manager</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <?php
    /**
     * Este snippe permite tomar una imagen aleatoria como background de la pagina
     */
    $bg = array('1.jpg', '2.jpg', '3.jpg');

    $i = rand(0, count($bg) - 1);
    $selectedBg = "$bg[$i]";
    ?>


    <style>
        html, body {
            background-image: url("/img/backgrounds/<?php echo $selectedBg; ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .fillter {
            background-color: #000000;
            opacity: .7;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .logo {
            width: 200px;
            height: auto;
            display: block;
            top: 20%;
            position: absolute;
            margin: auto;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #ffffff;
            padding: 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
            -ms-transition: all .35s;
            -o-transition: all .35s;
            transition: all .35s;
        }

        .links > a:hover {
            color: #f8fafc;
            background-color: #1b1e21;
        }

        .m-b-md {
            margin-bottom: 30px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height fillter">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Panel de control</a>
            @endauth
        </div>
    @endif

    <img class="col-sm-12 logo" src="{{asset('/img/logoB.png')}}" alt="HCD San Nicolas">

    <div class="content">
        <div class="title m-b-md">
            Expedient Manager
        </div>

        <div class="links">
            <a href="{{ route('login') }}">Acceder</a>
            <a href="{{ route('register') }}">Nuevo usuario</a>
            <a href="mailto:hello@agustinducca?subject=Solicitud%20de%20soporte%20-%20Expedient-Manager%20HCD%20San%20Nicolas">Ayuda</a>
        </div>
    </div>
</div>
</body>
</html>
