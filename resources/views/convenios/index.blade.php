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
                                <th>Ins. Externa</th>
                                <th style="width: 5px;">Codigo</th>
                                <th>Resolución</th>
                                <th>Duración</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th style="width: 5px;">Tipo Convenio</th>
                                <th>Ambito</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($convenio as $con)
                            <tr>
                                <td data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" title data-original-title="{{$con->titulo}}">{{$con->nombre}}</td>
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
                                <td>
                                    <div >
                                        <a  href="{{route('convenios.edit', $con->idconvenio)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        <a  href="{{route('convenio.Eliminar',$con->idconvenio)}}"  class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>

                                        <a  href="{{route('convenios.show', $con->idconvenio)}}" class="btn palette-Green btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-eye icon-tab"></i></a>
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

