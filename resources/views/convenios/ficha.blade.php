@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Ficha Convenio: {{$convenio->titulo}} </h3>

                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="waves-effect"><a
                                    href="{{route('convenios.show',$convenio->idconvenio)}}">Información</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.img',$convenio->idconvenio)}}">Imagenes</a>
                        </li>
                        <li class="active waves-effect"><a href="{{route('convenios.ficha',$convenio->idconvenio)}}">Ficha</a>
                        </li>
                    </ul>

                    <div class="pm-body clearfix">

                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view" style="padding: 5%;">

                                        <div class="card popular-post" style="width: 250px;">
                                            <div class="card-header ch-img"
                                                 style="padding:0;background-image: url(https://lh6.googleusercontent.com/-n7VYF50Z47M/VN0onnOtbdI/AAAAAAAAAYQ/lwyObtT3Xfo/w984-h209-no/153_chalkboard_bluegrey.jpg); height: 150px;">
                                                <div class="ch-img"
                                                     style="padding:10px;background: rgba(26, 188, 156,0.4);height:150px;">
                                                    <h2 style="font-size: 20px;">Ficha Convenio
                                                        <small>Comvenio DIGETI</small>
                                                    </h2>
                                                </div>
                                            </div>
                                            <div class="card-body m-t-20">
                                                <div class="list-group lg-alt">
                                                    <a data-toggle="modal" data-target="#exampleModalLong"
                                                       class="list-group-item view-more">
                                                        <i class="zmdi zmdi-long-arrow-right"></i>Abrir
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>


                                        </div>
                                    </div>

                                    <!--MODAL -->

                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Creando
                                                        Ficha</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <div class="row" style="margin-left: 15px;">
                                                            <div class="col-sm-4">
                                                                <dl class="dl-horizontal">
                                                                    <dt>Número Resolución:</dt>
                                                                    @foreach ($fic as $f)
                                                                        @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                            <dd value="{{$f->convenio_idconvenio}}">{{$f->num_resolucion}}</dd>
                                                                        @endif
                                                                    @endforeach
                                                                </dl>
                                                            </div>


                                                            <div class="col-sm-4">
                                                                <dl class="dl-horizontal">
                                                                    <dt>Número Registro:</dt>
                                                                    @foreach ($fic as $f)
                                                                        @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                            <dd value="{{$f->convenio_idconvenio}}">{{$f->num_registro}}</dd>
                                                                        @endif
                                                                    @endforeach
                                                                </dl>
                                                            </div>


                                                            <div class="col-sm-4">
                                                                <dl class="dl-horizontal">
                                                                    <dt>Ambito:</dt>
                                                                    @foreach ($fic as $f)
                                                                        @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                            <dd value="{{$f->convenio_idconvenio}}">{{$f->ambito}}</dd>
                                                                        @endif
                                                                    @endforeach
                                                                </dl>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row" style="margin-left: 15px;">
                                                            <div class="row col-sm-6">
                                                                <h4 style="color: #880e4f; font-weight: bold;">Datos de la Institución
                                                                    externa asociada al convenio</h4>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Número Resolución:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->nombre_ins}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Número Registro:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->sector}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Dirección:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->direccion}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Nombre Coordinador:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->nombre_coor}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Telefono Coordinador:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->telefono_coor}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Email Coordinador:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->email_coor}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--MITAD DERECHA-->
                                                            <div class="row col-sm-6">
                                                                <h4 style="color: #880e4f; font-weight: bold;">Dependencias de la
                                                                    Universidad Peruana Unión</h4>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Nombre del Área:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->nom_area}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Coordinador del Área:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->coor_area}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Telefono:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->telefono}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <dl class="dl-horizontal">
                                                                            <dt>Telefono:</dt>
                                                                            @foreach ($fic as $f)
                                                                                @if($f->convenio_idconvenio == $convenio->idconvenio)
                                                                                    <dd value="{{$f->convenio_idconvenio}}">{{$f->email}}</dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Close
                                                            </button>
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
            </div>
        </div>
    </section>



@stop