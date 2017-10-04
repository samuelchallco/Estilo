<div class="row">
	<div class="col-sm-4">
		<div class="input-group">

			<span class="input-group-addon">
				<i class="zmdi zmdi-account"></i>
			</span>
			<div class="fg-line">
				<input type="text" name="titulo" value="{{$convenio->idconvenio}}" class="form-control" placeholder="Titulo">
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
<br>
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
	<br>
	<div class="col-sm-4">
		<div class="input-group">
			<span class="input-group-addon">
				<i class="zmdi zmdi-account"></i>
			</span>
			
			<div class="fg-line">

				<select name="idtipo" name="idtipo" class="form-control">
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
	
		{!! Form::submit('GUARDAR',['class' => '']) !!}
		
</div>

