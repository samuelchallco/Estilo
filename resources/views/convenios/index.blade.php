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
                                <th style="width: 3px;font-weight: bold">Adenda</th>
                                <th style="font-weight: bold">Ins. Externa</th>
                                <th style="width: 10px; font-weight: bold;">Codigo</th>
                                <th style="width: 15px;  font-weight: bold;">Resolución</th>
                                <th style="width: 5px;  font-weight: bold;">Duración</th>
                                <th style="width: 8px;  font-weight: bold;">Fecha Inicio</th>
                                <th style="width: 8px;  font-weight: bold;">Fecha Vencimiento</th>
                                <th style="width: 8px;  font-weight: bold;">Tipo Convenio</th>
                                <th style="width: 5px;  font-weight: bold;">Ámbito</th>
                                <!--<th>Opciones</th>-->
                                <th style="width: 1px;  font-weight: bold;" >OPC.</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($convenio as $con)
                            <tr>
                                <td><div class="has-success">
                                        <div class="checkbox">
                                            <label id="che">
                                                @if($con->imagen==1)
                                                <input data-id_convenio="{{$con->idconvenio}}" id="checkadenda1" type="checkbox" value="0" checked>
                                                <i class="input-helper"></i>
                                                @else
                                                <input data-id_convenio="{{$con->idconvenio}}" id="checkadenda2" type="checkbox" value="1" >
                                                <i class="input-helper"></i>
                                                @endif
                                            </label>
                                        </div>
                                    </div></td>
                                <td data-container="body" data-toggle="tooltip" data-trigger="hover" data-placement="top" title data-original-title="{{$con->titulo}}">{{$con->nombre}}</td>
                                <td id="codigo" contenteditable="true" data-id_convenio="{{$con->idconvenio}}">{{$con->codigo}}</td>
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
@section('script')
    <script>
        
        function actualizar_codigo(id,codigo,columna) {
            $.ajax({
                url: '/convenio/editcodigo',
                method: 'POST',
                data: {id: id,codigo: codigo,columna: columna},
                success:function (data) {
                }
            })
        }
        $(document).on("blur","#codigo", function () {
            var id = $(this).data("id_convenio");
            var codigo = $(this).text();

            actualizar_codigo(id,codigo,"codigo");

        });

        function actualizar_adenda1(id,adnew) {
            $.ajax({
                url: '/convenio/editadenda',
                method: 'POST',
                data: {id: id,adnew: adnew},
                success:function (data) {
                }
            })
        }

        //PARA TODO EL DOCUMENTO CHECKBOX
        $(document).on('click', '#checkadenda1',function () {
            if($("#checkadenda1").val()) {
                var id = $(this).data("id_convenio");
                var adnew='0';
                //var ad=$(this).val();
                actualizar_adenda1(id,adnew);
                location.reload(true);
            }
        });
        $(document).on('click', '#checkadenda2',function () {
            if($("#checkadenda2:checked").val()) {
                var id = $(this).data("id_convenio");
                var adnew='1';
                //var ad=$(this).val();
                actualizar_adenda1(id,adnew);
                location.reload(true);
            }
        });
        //solo para el primer registro
        /*$("#checkadenda").on('click',"#checkadenda",function() {
            if($("#checkadenda:checked").val()) {
                var id = $(this).data("id_convenio");
                var ad=$(this).val();
                alert(id);
            } else {
                alert("No está activado");
            }
        });*/

    </script>
@endsection
@stop

