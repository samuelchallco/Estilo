@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Detalle Contrato: {{$contrato->titulo}}</h3>

                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active waves-effect"><a href="{{route('contrato.show',$contrato->idcontrato)}}">Información</a></li>
                        <li class="waves-effect"><a href="{{route('contrato.img',$contrato->idcontrato)}}">Archivos</a></li>
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
                                                        <dd>{{$contrato->titulo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Codigo:</dt>
                                                        <dd>{{$contrato->codigo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Resolución:</dt>
                                                        <dd>{{$contrato->objeto}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Duración:</dt>
                                                        <dd>{{$contrato->duracion}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Fecha Inicio:</dt>
                                                        <dd>{{$contrato->fecha_inicio}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Categorías:</dt>
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
                                                        <dd>{{$contrato->fecha_fin}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Ambito:</dt>
                                                        <dd>{{$contrato->ambito->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Pais:</dt>
                                                        <dd>{{$contrato->pais->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt><i class="zmdi zmdi-check-all"></i> Estado:</dt>
                                                        <dd>{{$contrato->estado->nombre}}</dd>
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