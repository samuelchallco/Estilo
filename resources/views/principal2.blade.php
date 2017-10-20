<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- prueba-->


        <link rel="stylesheet" href="{{asset('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/farbtastic/farbtastic.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/summernote/dist/summernote.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/css/app.min.1.css')}}" rel="stylesheet">

        <link href="{{asset('material/css/app.min.2.css')}}" rel="stylesheet">

        <link href="{{asset('material/css/demo.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/summernote/dist/summernote.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bootgrid/jquery.bootgrid.min.css')}}" rel="stylesheet">
        
        <link href="{{asset('material/vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css')}}" rel="stylesheet">

    </head>
    <body data-ma-header="teal">
        <header id="header" class="media">
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

            <ul class="pull-right h-menu">
                <li class="hm-search-trigger">
                    <a href="#" data-ma-action="search-open">
                        <i class="hm-icon zmdi zmdi-search"></i>
                    </a>
                </li>

                <li class="dropdown hidden-xs hidden-sm h-apps">
                    <a data-toggle="dropdown" href="#">
                        <i class="hm-icon zmdi zmdi-apps"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="#">
                                <i class="palette-Red-400 bg zmdi zmdi-calendar"></i>
                                <small>Calendar</small>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('excel.Convenios')}}">
                                <i class="palette-Green-400 bg zmdi zmdi-file-text"></i>
                                <small>Rep. Convenio</small>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="palette-Light-Blue bg zmdi zmdi-email"></i>
                                <small>Mail</small>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                        

                        
                    </ul>
                </li>

            </ul>
            <div class="media-body">
                <div style="background-image: url({{('imagenes/convenios/lg.png')}}); background-repeat: no-repeat;width:220px; height: 50px;"></div>
            </div>
            </div>
        </header>

        <section id="main">

            <aside id="s-main-menu" class="sidebar">
                <div class="smm-header">
                    <i class="zmdi zmdi-long-arrow-left" data-ma-action="sidebar-close"></i>
                </div>

                <ul class="main-menu">
                    
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> CONVENIOS</a>

                        <ul>
                            <li><a href="{{route('convenios.index')}}">Vigentes</a></li>
                            <li><a href="colored-header.html">Vencidos</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> CONTRATOS</a>

                        <ul>
                            <li><a href="{{route('convenios.index')}}">Vigentes</a></li>
                            <li><a href="colored-header.html">Vencidos</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-format-underlined"></i> USUARIOS</a>

                        <ul>
                            <li><a href="{{route('usuarios.index')}}">Activos</a></li>
                            <li><a href="{{route('usinactivo.index')}}">Inactivos</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-format-underlined"></i> RESPONSABLES</a>

                        <ul>
                            <li><a href="{{route('responsables.index')}}">Activos</a></li>
                            <li><a href="{{route('resinac.index')}}">Inactivos</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-format-underlined"></i> Control de Accesos</a>

                        <ul>
                            <li><a href="{{route('control.index')}}">Activos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </li>
                    

                </ul>
            </aside>


            <section class="content">
                <div class="container">
                    @yield('contents')

                </div>
            </section>
            <footer id="footer">
                Copyright &copy; 2017 Dracarys Team
            </footer>

        </section>
        
        

        <!-- Javascript Libraries -->

        <script src="{{asset('material/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        
        <script src="{{asset('material/vendors/bower_components/chosen/chosen.jquery.min.js')}}"></script>
        
        <script src="{{asset('material/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/Waves/dist/waves.min.js')}}"></script>

        <script src="{{asset('material/vendors/bootstrap-growl/bootstrap-growl.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/moment/min/moment.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/salvattore/dist/salvattore.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/flot/jquery.flot.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/flot/jquery.flot.resize.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/flot.curvedlines/curvedLines.js')}}"></script>

        <script src="{{asset('material/vendors/sparklines/jquery.sparkline.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

        <script src="{{asset('material/js/flot-charts/curved-line-chart.js')}}"></script>
        
        <script src="{{asset('material/js/flot-charts/line-chart.js')}}"></script>
        
        <script src="{{asset('material/js/charts.js')}}"></script>
        
        <script src="{{asset('material/js/functions.js')}}"></script>

        <script src="{{asset('material/js/actions.js')}}"></script>

        <script src="{{asset('material/js/demo.js')}}"></script>
    
        <script src="{{asset('material/vendors/bootgrid/jquery.bootgrid.updated.min.js')}}"></script>
        
        <script src="{{asset('material/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script> 

        <script src="{{asset('material/vendors/summernote/dist/summernote-updated.min.js')}}"></script>
        
        <script src="{{asset('material/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}"></script>
    
        <script src="{{asset('material/vendors/farbtastic/farbtastic.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
        
        <script src="{{asset('material/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}"></script>
        
        <script src="{{asset('material/vendors/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js')}}"></script>

        <script src="{{asset('material/vendors/fileinput/fileinput.min.js')}}"></script>

        <script src="{{asset('material/vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js')}}"></script>

        <!-- LLAMAR IMAGEN EN PLANTILLA BLADE
        <div class="card-header ch-img" style="background-image: url({{('material/img/demo/note.png')}}); height: 250px;"></div>
                            <div class="card-header">
                            -->

<script>
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
            $('.buscar tr').hide();
            $('.buscar tr').filter(function () {
                return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
</script>
    <script>
        $('#hola').on('shown.bs.modal', function () {
            $('#').focus()
        })
    </script>


    </body>

</html>
