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
                        <li class="waves-effect"><a href="{{route('convenios.img',$convenio->idconvenio)}}">Imagenes</a></li>
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
                                                        <dt>Titulo:</dt>
                                                        <dd>{{$convenio->titulo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Codigo:</dt>
                                                        <dd>{{$convenio->codigo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Resolución:</dt>
                                                        <dd>{{$convenio->resolucion}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Objetivo:</dt>
                                                        <dd>{{$convenio->objetivo}}</dd>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Duración:</dt>
                                                        <dd>{{$convenio->duracion}}</dd>
                                                    </dl>
                                                    <!--<dl class="dl-horizontal">
                                                        <dt>Categoria:</dt>
                                                        <dd>{{$convenio->categoria}}</dd>
                                                    </dl>-->


                                                    <dl class="dl-horizontal">
                                                        <dt>Fecha Inicio:</dt>
                                                        <dd>{{$convenio->fecha_ini}}</dd>
                                                    </dl>
                                                </div>
                                                <div class="col-sm-6">
                                                    <dl class="dl-horizontal">
                                                        <dt>Fecha Final:</dt>
                                                        <dd>{{$convenio->fecha_fin}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Tipo Convenio:</dt>
                                                        <dd>{{$convenio->tipo->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Ambito:</dt>
                                                        <dd>{{$convenio->ambito->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Pais:</dt>
                                                        <dd>{{$convenio->pais->nombre}}</dd>
                                                    </dl>
                                                    </dl>
                                                    <dl class="dl-horizontal">
                                                        <dt>Estado:</dt>
                                                        <dd>{{$convenio->estado->nombre}}</dd>
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