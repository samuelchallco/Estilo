<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- prueba-->

        <link href="{{asset('material/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/farbtastic/farbtastic.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/summernote/dist/summernote.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/chosen/chosen.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/google-material-color/dist/palette.css')}}" rel="stylesheet">


        <link href="{{asset('material/css/app.min.1.css')}}" rel="stylesheet">

        <link href="{{asset('material/css/app.min.2.css')}}" rel="stylesheet">

        <link href="{{asset('material/css/demo.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/summernote/dist/summernote.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bootgrid/jquery.bootgrid.min.css')}}" rel="stylesheet">
        
        <link href="{{asset('material/vendors/bower_components/lightgallery/dist/css/lightgallery.min.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet">

        <link href="{{asset('material/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css')}}" rel="stylesheet">
        @yield('header')

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
                            <a data-toggle="modal" data-target="#ModalRep">
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
                <div style="background-image: url({{('/imagenes/convenios/lg.png')}}); background-repeat: no-repeat;width:220px; height: 50px;"></div>
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
                        <a data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> CONVENIOS</a>

                        <ul>
                            <li><a href="{{url('CVigente')}}"><i class="zmdi zmdi-check"></i> Vigentes</a></li>
                            <li><a href="{{url('CVencido')}}"><i class="zmdi zmdi-dropbox"></i> Vencido</a></li>
                            <li><a href="{{url('CTramite')}}"><i class="zmdi zmdi-arrow-right"></i> Tramite</a></li>


                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> CONTRATOS</a>

                        <ul>
                            <li><a href="{{url(('ContratoVigente'))}}">Vigentes</a></li>
                            <li><a href="{{url(('ContratoVencido'))}}">Vencidos</a></li>
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

        <!-- Modal Exportar Exel-->
        <div class="modal fade" id="ModalRep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="post" action="{{url('excelConvenios')}}">
                        {{ csrf_field() }}
                    <div class="modal-header">
                            <h2>Exportar convenios  <small>Selecciona los campos que desea exportar de los convenios</small></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="card-body card-padding">
                                <p class="f-500 c-black m-b-5">Convenio</p>
                                <small>Seleccionar campos de que desea exportar</small>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="red">
                                            <label for="titulo" class="ts-label">Titulo</label>
                                            <input id="titulo" type="checkbox" hidden="hidden" checked name="Titulo_c">
                                            <label for="titulo" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="blue">
                                            <label for="Codigo_c" class="ts-label">Codigo</label>
                                            <input id="Codigo_c" type="checkbox" hidden="hidden" name="Codigo_c">
                                            <label for="Codigo_c" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="green">
                                            <label for="Resolucion_c" class="ts-label">Resolucion</label>
                                            <input id="Resolucion_c" type="checkbox" hidden="hidden" name="Resolucion_c">
                                            <label for="Resolucion_c" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="cyan">
                                            <label for="Objetivo_c" class="ts-label">Objetivo</label>
                                            <input id="Objetivo_c" type="checkbox" hidden="hidden" name="Objetivo_c">
                                            <label for="Objetivo_c" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="lime">
                                            <label for="Duraion_c" class="ts-label">Duracion</label>
                                            <input id="Duraion_c" type="checkbox" hidden="hidden" name="Duraion_c">
                                            <label for="Duraion_c" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="amber">
                                            <label for="Fechaini_c" class="ts-label">Fecha Inicio</label>
                                            <input id="Fechaini_c" type="checkbox" hidden="hidden" name="Fechaini_c">
                                            <label for="Fechaini_c" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="purple">
                                            <label for="fecchafinal_c" class="ts-label">Fecha Final</label>
                                            <input id="fecchafinal_c" type="checkbox" hidden="hidden" name="fecchafinal_c">
                                            <label for="fecchafinal_c" class="ts-helper"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="pink">
                                            <label for="tipo_c" class="ts-label">Tipo Convenio</label>
                                            <input id="tipo_c" type="checkbox" hidden="hidden" checked name="tipo_c">
                                            <label for="tipo_c" class="ts-helper"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="red">
                                            <label for="Ambito_c" class="ts-label">Ambito</label>
                                            <input id="Ambito_c" type="checkbox" hidden="hidden" checked name="Ambito_c">
                                            <label for="Ambito_c" class="ts-helper"></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="blue">
                                            <label for="Pais_c" class="ts-label">Pais</label>
                                            <input id="Pais_c" type="checkbox" hidden="hidden" name="Pais_c">
                                            <label for="Pais_c" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="green">
                                            <label for="Estado_c" class="ts-label">Estado</label>
                                            <input id="Estado_c" type="checkbox" hidden="hidden" name="Estado_c">
                                            <label for="Estado_c" class="ts-helper"></label>
                                        </div>
                                    </div>
                                </div>
                                <p class="f-500 c-black m-b-5">Fichas</p>
                                <small>Seleccionar campos de que desea exportar</small>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="red">
                                            <label for="ts2" class="ts-label">Número Resolución</label>
                                            <input id="ts2" type="checkbox" hidden="hidden" name="Nresolucion_f">
                                            <label for="ts2" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="blue">
                                            <label for="ts3" class="ts-label">Número Registro</label>
                                            <input id="ts3" type="checkbox" hidden="hidden" name="Nregistro_f">
                                            <label for="ts3" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="green">
                                            <label for="ts4" class="ts-label">Dirección</label>
                                            <input id="ts4" type="checkbox" hidden="hidden" name="Direcion_f">
                                            <label for="ts4" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="cyan">
                                            <label for="ts5" class="ts-label">Telefono</label>
                                            <input id="ts5" type="checkbox" hidden="hidden" name="telefono_f">
                                            <label for="ts5" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="lime">
                                            <label for="ts6" class="ts-label">Telefono Coordinador</label>
                                            <input id="ts6" type="checkbox" hidden="hidden" name="telcord_f">
                                            <label for="ts6" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="amber">
                                            <label for="ts7" class="ts-label">Email Coordinador</label>
                                            <input id="ts7" type="checkbox" hidden="hidden" name="EmailCod_f">
                                            <label for="ts7" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="purple">
                                            <label for="ts8" class="ts-label">Coordinador del Área</label>
                                            <input id="ts8" type="checkbox" hidden="hidden" name="CordArea_f">
                                            <label for="ts8" class="ts-helper"></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 m-b-20">
                                        <div class="toggle-switch" data-ts-color="pink">
                                            <label for="ts9" class="ts-label">Email</label>
                                            <input id="ts9" type="checkbox" hidden="hidden" name="email_f">
                                            <label for="ts9" class="ts-helper"></label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Exportar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
@yield('script')

</html>
