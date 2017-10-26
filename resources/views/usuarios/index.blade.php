@extends ('principal2')
@section ('contents')

<section id="content">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <h2> Lista de Usuarios<a href="{{route('usuarios.create')}}"  class= "btn palette-Red-600 bg waves-effect" style="margin-left: 150px;"><i class="zmdi zmdi-assignment-o"></i> Crear</a></h2>
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
                                <th>Email</th>
                                <th>Password</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach($usuario as $us)
                            <tr>
                                <td>{{$us->idusuario}}</td>
                                <td>{{$us->nombre}}</td>
                                <td>{{$us->correo}}</td>
                                <td>*******************</td>
                                <td>{{$us->tipo}}</td>
                                <td>{{$us->esnom}}</td>
                                <td>
                                    <div class="row">
                                        
                                    <a href="{{route('usuarios.edit', $us->idusuario)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                    <a href="{{route('usuario.Eliminar', $us->idusuario)}}"  class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>
                                    						
						{!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{$usuario->render()}}
                </div>

            </div>

        </div>
        
</section>

@stop