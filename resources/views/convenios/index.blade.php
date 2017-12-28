@extends ('principal2')
@section ('contents')
<section id="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h2> Lista de Convenios<a href="{{route('convenios.create')}}"  class= "btn palette-Red-600 bg waves-effect" style="margin-left: 150px;">
                        <i class="zmdi zmdi-assignment-o"></i> Crear</a></h2>
                <div class="input-group col-sm-3" style="margin-left: 450px; margin-top: -35px;">
                <span class="zmdi icon input-group-addon zmdi-search zmdi-hc-fw"></span>

                    <div class="fg-line">

                        <input type="text" id="filtrar" class="search-field form-control" placeholder="Buscar">
                    </div>
                </div>

              </div>

                </div>


        <div class="table-responsive">
                    <table id="data-table-basic" class="table table-hover table-vmiddle">
                        <thead>
                            <tr>
                                <th style="font-weight: bold">Ins. Externa</th>
                                <th style="width: 10px; font-weight: bold;">Codigo</th>
                                <th style="width: 15px;  font-weight: bold;">Resolución</th>
                                <th style="width: 5px;  font-weight: bold;">Duración</th>
                                <th style="width: 8px;  font-weight: bold;">Fecha Inicio</th>
                                <th style="width: 8px;  font-weight: bold;">Fecha Vencimiento</th>
                                <th style="width: 8px;  font-weight: bold;">Tipo Convenio</th>
                                <th style="width: 5px;  font-weight: bold;">Ambito</th>
                                <!--<th>Opciones</th>-->
                                <th style="width: 1px;  font-weight: bold;" >OPC.</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($convenio as $con)
                            <tr>
                                <td data-container="body" data-toggle="tooltip" data-trigger="hover" data-placement="top" title data-original-title="{{$con->titulo}}">{{$con->nombre}}</td>
                                <td>{{$con->codigo}}</td>
                                <td>{{$con->resolucion}}</td>
                                <td>{{$con->duracion}}</td>
                                <td>{{$con->fecha_ini}}</td>
                                <td>{{$con->fecha_fin}}</td>
                                @if(isset($con->tipo->nombre))
                                <td>{{$con->tipo->nombre}}</td>
                                @endif
                                @if(isset($con->ambito->nombre))
                                <td>{{$con->ambito->nombre}}</td>
                                @endif
                                <!--<td>
                                    <div >
                                        <a  href="{{route('convenios.edit', $con->idconvenio)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        <a  href="{{route('convenio.Eliminar',$con->idconvenio)}}"  class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>

                                        <a  href="{{route('convenios.show', $con->idconvenio)}}" class="btn palette-Green btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-eye icon-tab"></i></a>
                                    </div>
                                </td>-->
                                <td>
                                    <ul class="actions">
                                        <li class="dropdown action-show ">
                                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="zmdi zmdi-more-vert "></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a  href="{{route('convenios.edit', $con->idconvenio)}}"><i class="zmdi zmdi-edit zmdi-hc-fw"> Editar</i></a>
                                                </li>
                                                <li>
                                                    <a  href="{{route('convenios.show', $con->idconvenio)}}"><i class="zmdi zmdi-eye icon-tab"> Detalles</i></a>
                                                </li>
                                                <li>
                                                    <a  href="{{route('convenio.Eliminar',$con->idconvenio)}}" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"> Eliminar</i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            {{$convenio->render()}}
        </div>
    </div>
</section>
@stop

