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
                                <th>Codigo</th>
                                <th>objeto</th>
                                <th>Duración</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Ambito</th>
                                <th>Pais</th>
                                <th>Opciones</th>
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
                                <td>
                                    <div >
                                        <a  href="{{route('contrato.edit', $con->idcontrato)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        <a  href="{{route('contrato.eliminar', $con->idcontrato)}}" class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>

                                        <a  href="{{route('contrato.show', $con->idcontrato)}}" class="btn palette-Green btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-eye icon-tab"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

</section>

@stop

