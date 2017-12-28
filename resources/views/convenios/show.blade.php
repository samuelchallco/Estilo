@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Detalle Convenio: {{$convenio->titulo}}</h3>

                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active waves-effect"><a href="{{route('convenios.show',$convenio->idconvenio)}}">Información</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.img',$convenio->idconvenio)}}">Archivos</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.ficha',$convenio->idconvenio)}}">Ficha</a></li>
                    </ul>

                    <div class="pm-body clearfix">


                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <br>
                                        <div class="row" style="margin-left: 15px;">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Titulo:</dt>
                                                        <dd>{{$convenio->titulo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Codigo:</dt>
                                                        <dd>{{$convenio->codigo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt> <i class="zmdi zmdi-check-all"></i> Resolución:</dt>
                                                        <dd>{{$convenio->resolucion}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Objetivo:</dt>
                                                        <dd>{{$convenio->objetivo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Duración:</dt>
                                                        <dd>{{$convenio->duracion}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Fecha Inicio:</dt>
                                                        <dd>{{$convenio->fecha_ini}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Categorias:</dt>
                                                        <dd>
                                                            @php
                                                                $exis = array()
                                                            @endphp
                                                            @foreach($cat as $ca)
                                                                <table>{{$ca->categoria->nombre}}</table>
                                                            @endforeach
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <div class="col-sm-6">
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Fecha Final:</dt>
                                                        <dd>{{$convenio->fecha_fin}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Tipo Convenio:</dt>
                                                        <dd>{{$convenio->tipo->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Ambito:</dt>
                                                        <dd>{{$convenio->ambito->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Pais:</dt>
                                                        <dd>{{$convenio->pais->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Estado:</dt>
                                                        <dd>{{$convenio->estado->nombre}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Responsables:</dt>
                                                        <dd>
                                                            @php
                                                                $exis = array()
                                                            @endphp
                                                            @foreach($RCon as $rcon)
                                                                <table>{{$rcon->responsable->nombre}}</table>
                                                            @endforeach

                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </section>



@stop