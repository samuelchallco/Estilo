@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Ficha Convenio: {{$convenio->titulo}} <button class="btn btn-info waves-effect" data-toggle="modal"
                                                                      data-target="#exampleModalLong" style="margin-left: 150px;">
                            <i class="zmdi zmdi-assignment-o"></i> Crear</button></h3>

                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="waves-effect"><a href="{{route('convenios.show',$convenio->idconvenio)}}">Información</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.img',$convenio->idconvenio)}}">Imagenes</a></li>
                        <li class="active waves-effect"><a href="{{route('convenios.ficha',$convenio->idconvenio)}}">Ficha</a></li>
                    </ul>

                    <div class="pm-body clearfix">

                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <br>
                                        <br>
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
                                            <h4 style="color: #880e4f; font-weight: bold;">Datos de la Institución externa asociada al convenio</h4>
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
                                            <h4 style="color: #880e4f; font-weight: bold;">Dependencias de la Universidad Peruana Unión</h4>
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
                                        </div>
                                    </div>

                                <!--MODAL -->

                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">hello</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                {!! Form::open( ['route'=>'fichas.store','method'=>'POST','convenio'=>$convenio]) !!}

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="num_resolucion" class="form-control">
                                                                                <label class="fg-label">num_resolucion</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="num_registro" class="form-control">
                                                                                <label class="fg-label">num_registro</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="ambito" class="form-control">
                                                                                <label class="fg-label">ambito</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="nombre_ins" class="form-control">
                                                                                <label class="fg-label">nombre_ins</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="sector" class="form-control">
                                                                                <label class="fg-label">sector</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="direccion" class="form-control">
                                                                                <label class="fg-label">direccion</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="telefono_coor" class="form-control">
                                                                                <label class="fg-label">telefono_coor</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="email_coor" class="form-control">
                                                                                <label class="fg-label">email_coor</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="coor_area" class="form-control">
                                                                                <label class="fg-label">coor_area</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="telefono" class="form-control">
                                                                                <label class="fg-label">telefono</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="input-group fg-float">
                                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                            <div class="fg-line">
                                                                                <input type="text" name="email" class="form-control">
                                                                                <label class="fg-label">email</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="fg-line">
                                                                            <label class="fg-label">convenio</label>
                                                                            <input type="text" name="convenio_idconvenio" class="form-control" value="{{$convenio->idconvenio}}" disabled placeholder="convenio">

                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <br/>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </div>
                                            {!! Form::close() !!}
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