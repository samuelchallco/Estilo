<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Covenios') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="   width: 100%;
    height: 100%;
    position: absolute;
    background-image: url(/imagenes/bg1.jpg);
    background-repeat: no-repeat;">
        <header id="header" class="media" style="background:  rgb(136, 14, 79);  margin-bottom: 9%;">
            <div class="pull-left h-logo">
                <a href="" class="hidden-xs">

                    <small></small>
                </a>

                <div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">
                    <div class="mc-wrap">
                        <div class="mcw-line top palette-White bg"></div>
                        <div class="mcw-line center palette-White bg"></div>
                        <div class="mcw-line bottom palette-White bg"></div>
                    </div>
                </div>
            </div>
            <!--<div class="pull-right h-menu">
                    <h1>Sistema de Convenios</h1>
                </div>-->

            <div class="media-body">
                <div style="background-image: url(imagenes/convenios/lg.png); background-repeat: no-repeat;width:220px; height: 50px;margin-left: 39%;"></div>
            </div>

        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
