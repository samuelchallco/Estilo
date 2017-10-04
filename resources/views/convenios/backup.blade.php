{!!Html::style('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')!!}
        
        {!!Html::style('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js')!!}

        {!!Html::style('material/vendors/bower_components/animate.css/animate.min.css')!!}
        
        {!!Html::style('material/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')!!}
        
        {!!Html::style('material/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')!!}

        {!!Html::style('material/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')!!}

        {!!Html::style('material/vendors/bower_components/google-material-color/dist/palette.css')!!}
        
        {!!Html::style('material/css/app.min.1.css')!!}

        {!!Html::style('material/css/app.min.2.css')!!}


        @extends('principal2')
@section('contents')

{!! Form::model($convenio, ['method' => 'PATCH', 'route'=>['convenios.update', $convenio->idconvenio] ]) !!}

<div class="card">
	<div class="card-body card-padding">
		<h3>Editando Convenio: {{$convenio->titulo}}</h3>

		<br>	
		<div class="row">
		<div class="row">
			
		
			<div class="col-sm-4">
				<div class="input-group">

					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="id" value="{{$convenio->idconvenio}}" class="form-control" placeholder="Titulo">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="input-group">

					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="titulo" value="{{$convenio->titulo}}" class="form-control" placeholder="Titulo">
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="codigo" value="{{$convenio->codigo}}" class="form-control" placeholder="codigo">
					</div>
				</div>
			</div>
			</div>
			<div class="row">
				
			
			<br>
			<br>
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="resolucion" class="form-control" value="{{$convenio->resolucion}}" placeholder="Resolución">
					</div>
				</div>

			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="objetivo" class="form-control"
						value="{{$convenio->objetivo}}" placeholder="Objetivo">
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="duracion" class="form-control" value="{{$convenio->duracion}}" placeholder="Duración">
					</div>
				</div>
			</div>
			</div>
			<br>
			<br>
			<div class="row">
				
			
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="categoria" class="form-control" value="{{$convenio->categoria}}" placeholder="Categoria">
					</div>
				</div>

			</div>
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="fecha_ini" class="form-control" value="{{$convenio->fecha_ini}}" placeholder="Fecha Inicio">
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>
					<div class="fg-line">
						<input type="text" name="fecha_fin" class="form-control" value="{{$convenio->fecha_fin}}" placeholder="Fecha Final">
					</div>
				</div>
			</div>
			</div>
			<br>
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">

						<select name="idtipo" class="form-control">
							@foreach ($Ti as $t)
							@if($t->idtipo == $convenio->tipo_idtipo)
							<option value="{{$t->idtipo}}" selected>{{$t->nombre}}</option>
							@else
							<option value="{{$t->idtipo}}">{{$t->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>

			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">

						<select name="idtipoconvenio" class="form-control">
							@foreach ($tc as $tc)
							@if($tc->idtipoconvenio == $convenio->tipo_idtipoconvenio)
							<option value="{{$tc->idtipoconvenio}}" selected>{{$tc->nombre}}</option>
							@else
							<option value="{{$tc->idtipoconvenio}}">{{$tc->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">

						<select name="idambito" class="form-control">
							@foreach ($amb as $am)
							@if($am->idambito == $convenio->ambito_idambito)
							<option value="{{$am->idambito}}" selected>{{$am->nombre}}</option>
							@else
							<option value="{{$am->idambito}}">{{$am->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
			</div>
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">

						<select name="idpais" class="form-control">
							@foreach ($pa as $pa)
							@if($pa->idpais == $convenio->pais_idpais)
							<option value="{{$pa->idpais}}" selected>{{$pa->nombre}}</option>
							@else
							<option value="{{$pa->idpais}}">{{$pa->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>

			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">

						<select name="idestado" class="form-control">
							@foreach ($es as $es)
							@if($es->idestado == $convenio->estado_idestado)
							<option value="{{$es->idestado}}" selected>{{$es->nombre}}</option>
							@else
							<option value="{{$es->idestado}}">{{$es->nombre}}</option>
							@endif
							@endforeach
						</select>
					</div>
				</div>
				<br>
			</div>
			<br>	
			<button type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>

		</div>


	</div>

</div>

{!! Form::close() !!}
@endsection





card crear

<div class="section">
<div class="card">
    <div class="card-header">
        <div class="p-relative">
            <div class="actionBar">
            <h2>Lista de Convenios 
            
            <a href="{{route('convenios.create')}}"  class= "btn palette-Red-600 bg waves-effect" style="margin-left: 150px;"><i class="zmdi zmdi-assignment-o"; "></i> Crear</a></h2>   
            </div>
                
            
        </div>
    </div>


    Editar
    <td>
                                    <a href="{{route('convenios.edit', $con->idconvenio)}}" class="btn palette-Blue btn-icon bg waves-effect waves-circle waves-float"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                    <a href="{{route('convenio.Eliminar',$con->idconvenio)}}"  class="btn palette-Red-600 btn-icon bg waves-effect waves-circle waves-float" onclick ><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a>
                                </td>

                                $table->increments('id');

            $table->integer('convenio_idconvenio')->unsigned();
            $table->foreign('convenio_idconvenio')->references('idconvenio')->on('convenio');
            $table->integer('usuario_idusuario')->unsigned();
            $table->foreign('usuario_idusuario')->references('idusuario')->on('usuario');
            $table->integer('responsable_idresponsable')->unsigned();
            $table->foreign('responsable_idresponsable')->references('idresponsable')->on('responsable');
            $table->timestamps();


            $table->increments('idambito');
            $table->string('nombre')->nullable();
            $table->timestamps();