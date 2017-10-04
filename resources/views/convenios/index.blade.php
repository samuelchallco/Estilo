@extends ('principal2')
@section ('contents')
<section id="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h2> Lista de Convenios<a href="{{route('convenios.create')}}"  class= "btn palette-Red-600 bg waves-effect" style="margin-left: 150px;"><i class="zmdi zmdi-assignment-o"; "></i> Crear</a></h2> 
                <div class="input-group col-sm-3" style="margin-left: 450px; margin-top: -35px;">
                <span class="zmdi icon input-group-addon zmdi-search zmdi-hc-fw"></span>

                    <div class="fg-line">
                        
                        <input type="text" id="filtrar" class="search-field form-control" placeholder="Buscar">
                    </div>
                    <!--<div class="dropdown btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                            <span class="dropdown-text">
                                <span class="zmdi icon zmdi-view-module"></span>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <div class="checkbox">
                                    <label class="dropdown-item">
                                        <input type="checkbox" name="id" value="1" class="dropdown-item-checkbox check_ocultar" checked="checked">ID
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>-->
                    
                </div>
                
              </div>

                </div>
                <div class="table-responsive">

                    <table id="data-table-basic" class="table table-striped table-vmiddle">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Codigo</th>
                                <th>Resolución</th>
                                <th>Objetivo</th>
                                <th>Duración</th>
                                <th>Categoria</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Imagen</th>
                                <th>Tipo</th>
                                <th>Tipo Convenio</th>
                                <th>Ambito</th>
                                <th>Pais</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($convenio as $con)
                            <tr>
                                <td>{{$con->idconvenio}}</td>
                                <td>{{$con->titulo}}</td>
                                <td>{{$con->codigo}}</td>
                                <td>{{$con->resolucion}}</td>
                                <td>{{$con->objetivo}}</td>
                                <td>{{$con->duracion}}</td>
                                <td>{{$con->categoria}}</td>
                                <td>{{$con->fecha_ini}}</td>
                                <td>{{$con->fecha_fin}}</td>
                                <td><div class="lightbox photos">

                                <div data-src="{{asset('imagenes/convenios/'.$con->imagen)}}">
                                <div class="lightbox-item p-item">
                                    <img src="{{asset('imagenes/convenios/'.$con->imagen)}}" alt="" />
                                </div>
                                </div> </td>
                                <td>{{$con->nomtipo}}</td>
                                <td>{{$con->tcnom}}</td>
                                <td>{{$con->ambnom}}</td>
                                <td>{{$con->nompais}}</td>
                                <td>{{$con->nomestado}}</td>
                                
                                <td>
                                    <div class="row">
                                        
                                    
                                    <a href="{{route('convenios.edit', $con->idconvenio)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                    <a href="{{route('convenio.Eliminar',$con->idconvenio)}}"  class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{$convenio->render()}}
                </div>

            </div>

        </div>
        
</section>

@stop

