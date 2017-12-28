@extends ('principal2')
@section ('contents')
<section id="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h2> Lista de Contratos<a href="{{route('contrato.create')}}"  class= "btn palette-Red-600 bg waves-effect" style="margin-left: 150px;">
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
                                <th>Titulo</th>
                                <th style="width: 8px;">Codigo</th>
                                <th style="width: 15px;">objeto</th>
                                <th style="width: 10px;">Duración</th>
                                <th style="width: 10px;">Fecha Inicio</th>
                                <th style="width: 10px;">Fecha Vencimiento</th>
                                <th style="width: 10px;">Ambito</th>
                                <th style="width: 10px;">Pais</th>
                                <th style="width: 1px;">Opc.</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($contrato as $con)
                            <tr>
                                <td>{{$con->titulo}}</td>
                                <td>{{$con->codigo}}</td>
                                <td>{{$con->objeto}}</td>
                                <td>{{$con->duracion}}</td>
                                <td>{{$con->fecha_inicio}}</td>
                                <td>{{$con->fecha_fin}}</td>
                                @if(isset($con->ambito->nombre))
                                <td>{{$con->ambito->nombre}}</td>
                                @endif
                                @if(isset($con->pais->nombre))
                                <td>{{$con->pais->nombre}}</td>
                                @endif
                                <!--<td>

                                </td>-->
                                <td>
                                    <ul class="actions">
                                        <li class="dropdown action-show ">
                                            <a href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="zmdi zmdi-more-vert "></i>
                                            </a>

                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a  href="{{route('contrato.edit', $con->idcontrato)}}"><i class="zmdi zmdi-edit zmdi-hc-fw"> Editar</i></a>
                                                </li>
                                                <li>
                                                    <a  href="{{route('contrato.show', $con->idcontrato)}}"><i class="zmdi zmdi-eye icon-tab"> Detalles</i></a>
                                                </li>
                                                <li>
                                                    {!! Form::open(['route' => ['contratos.eli', $con->idcontrato], 'method' => 'PATCH']) !!}
                                                    <button class="btn-block    bg waves-effect"> Eliminar</button>
                                                    {!! Form::close() !!}
                                                </li>
                                                <li>

                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            {{$contrato->render()}}
        </div>
    </div>
</section>

@stop

