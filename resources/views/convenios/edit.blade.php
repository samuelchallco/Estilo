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

						<span class="input-group-addon"><i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line"><label class="fg-label">titulo</label>
							<input type="text" name="titulo" value="{{$convenio->titulo}}" class="form-control" placeholder="Titulo" >
							
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Codigo</label>	
							<input type="text" name="codigo" value="{{$convenio->codigo}}" class="form-control" placeholder="codigo">
							
						</div>
					</div>
				</div>
			
			<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Resolución</label>
							<input type="text" name="resolucion" class="form-control" value="{{$convenio->resolucion}}" placeholder="Resolución">
							
						</div>
					</div>
				</div>
			</div>	
			<br/>
			<br/>
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Objetivo</label>
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
						<label class="fg-label">Duración</label>
							<input type="text" name="duracion" class="form-control" value="{{$convenio->duracion}}" placeholder="Duración">
							
						</div>
					</div>
				</div>
			
			<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Categoria</label>
							<input type="text" name="categoria" class="form-control" value="{{$convenio->categoria}}" placeholder="Categoria">
							
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
						<label class="fg-label">Fecha inicio</label>
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
						<label class="fg-label">Fecha final</label>
							<input type="text" name="fecha_fin" class="form-control" value="{{$convenio->fecha_fin}}" placeholder="Fecha Final">
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>

						<div class="fg-line">
							<label class="fg-label">Tipo</label>
							<select name="idtipo" class="selectpicker">
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
							<label class="fg-label">Tipo/convenio</label>
							<select name="idtipoconvenio" class="selectpicker">
								@foreach ($tc as $tc)
								@if($tc->idtipoconvenio == $convenio->tipoconvenio_idtipoconvenio)
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
							<label class="fg-label">Ambito</label>
							<select name="idambito" class="selectpicker">
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
				</div>
				<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">
						<label class="fg-label">Pais</label>
						<select name="idpais" class="selectpicker">
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
						<label class="fg-label">Estado</label>
						<select name="idestado" class="selectpicker">
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

</div>

{!! Form::close() !!}
@endsection