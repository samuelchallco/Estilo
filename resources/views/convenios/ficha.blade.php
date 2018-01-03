@extends('principal2')
@section('contents')

    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Fichas de Contacto del Convenio:  {{$convenio->titulo}}
                        @if(Auth::user()->rol_idrol == '1')
                        <button class="btn btn-info waves-effect" data-toggle="modal"
                           data-target="#exampleModalLong"  style="margin-left: 150px;">

                           <i class="zmdi zmdi-assignment-o"></i> Crear</button>@endif</h3>

                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="waves-effect"><a
                                    href="{{route('convenios.show',$convenio->idconvenio)}}">Información</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.img',$convenio->idconvenio)}}">Archivos</a>
                        </li>
                        <li class="active waves-effect"><a href="{{route('convenios.ficha',$convenio->idconvenio)}}">Ficha</a>
                        </li>
                    </ul>


                    <div class="m-b-30">
                        <br>
                        <div class="row">
                            @foreach($ficha as $fi)
                            <div class="col-sm-4 col-xs-6">
                                <div class="card popular-post  z-depth-3" style="width: 250px; margin-left: 50px;" >
                                    <div class="card-header ch-img"
                                         style="padding:0;background-image: url(https://lh6.googleusercontent.com/-n7VYF50Z47M/VN0onnOtbdI/AAAAAAAAAYQ/lwyObtT3Xfo/w984-h209-no/153_chalkboard_bluegrey.jpg);
                                          height: 60px;">
                                        <div class="ch-img"
                                             style="padding:10px;background: rgba(26, 188, 156,0.4);height:60px;">
                                            <h2 style="font-size: 20px;">{{$fi->email_coor}}
                                                <small></small>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="card-body m-t-5">
                                        <div class="list-group lg-alt">
                                            <a class="list-group-item view-more"
                                               href="{{route('convenios.imprimir',[$convenio->idconvenio,$fi->idficha])}}" onclick>
                                                <i class="zmdi zmdi-long-arrow-right"></i>Ver
                                            </a>
                                            @if(Auth::user()->rol_idrol=='1')
                                            {!! Form::open(['route' => ['fichas.destroy', $fi->idficha], 'method' => 'DELETE']) !!}
                                            <button class="list-group-item view-more"  >
                                                <i class="zmdi zmdi-long-arrow-right" style="margin-left: 60px"></i>Eliminar
                                            </button>
                                            {!! Form::close() !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>

                    </div>


                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                               <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Creando Ficha</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                                  </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {!! Form::open( ['route'=>'fichas.store','method'=>'POST','convenio'=>$convenio]) !!}
                                                <div class="row" style="margin-left: 15px;">
                                                    <div class="col-sm-4">
                                                        <div class="input-group fg-float">
                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                            <div class="fg-line">
                                                                <input type="text"  name="convenio_idconvenio" class="form-control" value="{{$convenio->idconvenio}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row" style="margin-left: 15px;">
                                                    <div class="col-sm-4">
                                                        <div class="input-group fg-float">
                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                            <div class="fg-line">
                                                                <label class="fg-label">N° Resolución</label>
                                                                <input type="text"  name="num_resolucion" class="form-control" value="{{$convenio->resolucion}}">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group fg-float">
                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                            <div class="fg-line">
                                                                <label class="fg-label">N° Registro</label>
                                                                <input type="text" id="registro2" name="num_registro" class="form-control" value="{{$convenio->codigo}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="input-group fg-float">
                                                            <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                            <div class="fg-line">
                                                                @foreach ($amb as $am)
                                                                    @if($am->idambito == $convenio->ambito_idambito)
                                                                        <input type="text" name="ambito" value="{{$am->nombre}}" class="form-control">
                                                                    @endif
                                                                    <label class="fg-label">Ámbito</label>
                                                                    @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row" style="margin-left: 15px;">
                                                    <div class="row col-sm-6">
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" id="nombre_ins" name="nombre_ins" class="form-control" value="{{$convenio->nombre}}">
                                                                    <label class="fg-label">Nombre de la Institución Externa</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="sector" class="form-control" value="{{old('sector')}}" autofocus>
                                                                    <label class="fg-label">RUC</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
                                                                    <label class="fg-label">Dirección de la Institución Externa</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 style="color: #880e4f; font-weight: bold;">Coordinadores Insterinstitucionales</h5>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="nombre_coor" class="form-control" value="{{old('nombre_coor')}}">
                                                                    <label class="fg-label">Nombre Coordinador de la Institución Externo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="cargo_coor" class="form-control" value="{{old('cargo_coor')}}">
                                                                    <label class="fg-label">Cargo del Coordinador de la Institución Externo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="telefono_coor" class="form-control" value="{{old('telefono_coor')}}">
                                                                    <label class="fg-label">Teléfono del Coordinador de la Institución Externo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="email_coor" class="form-control" value="{{old('email_coor')}}">
                                                                    <label class="fg-label">Email del Coordinador de la Institución Externo</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--MITAD DERECHAAAAA-->
                                                    <br><br><br><br><br><br><br><br><br><br><br>
                                                    <div class="row col-sm-6" style="margin-left: 15px;">
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="nom_area" class="form-control" value="{{old('nom_area')}}">
                                                                    <label class="fg-label">Nombre del Coordinador de la UPeU</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="coor_area" class="form-control" value="{{old('coor_area')}}">
                                                                    <label class="fg-label">Cargo del Coordinador de la UPeU</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}">
                                                                    <label class="fg-label">Teléfono del Coordinador de la UPeU</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="input-group fg-float">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                                                <div class="fg-line">
                                                                    <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                                                    <label class="fg-label">Email del Coordinador de la UPeU</label>
                                                                </div>
                                                            </div>
                                                        </div>                                <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                         <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                         <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop