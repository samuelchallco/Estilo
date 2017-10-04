@extends ('principal2')
@section ('contents')

<section id="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h2> Lista de Responsable<a href="{{route('responsables.create')}}"  class= "btn palette-Red-600 bg waves-effect" style="margin-left: 150px;"><i class="zmdi zmdi-assignment-o"; "></i> Crear</a></h2> 
                <div class="input-group col-sm-3" style="margin-left: 450px; margin-top: -35px;">
                <span class="zmdi icon input-group-addon zmdi-search zmdi-hc-fw"></span>

                    <div class="fg-line">
                        
                        <input type="text" id="filtrar" class="search-field form-control" placeholder="Buscar">
                    </div>
                    
                </div>
                
              </div>

                </div>
                <div class="table-responsive">

                    <table id="data-table-basic" class="table table-striped table-vmiddle">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>descripción</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($responsable as $re)
                            <tr>
                                <td>{{$re->idresponsable}}</td>
                                <td>{{$re->nombre}}</td>
                                <td>{{$re->descripcion}}</td>
                                <td>{{$re->esnom}}</td>
                                <td>
                                    <div class="row">
                                        
                                    <a href="{{route('responsables.edit', $re->idresponsable)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                    <a href="{{route('responsable.Eliminar', $re->idresponsable)}}"  class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>
                                    						
						{!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{$responsable->render()}}
                </div>

            </div>

        </div>
        
</section>

@stop