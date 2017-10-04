@extends('principal2')
@section('contents')


<div class="card">
	<div class="card-body card-padding">
		<h3>Crear Convenio</h3>
		<br>
		<div class="row">
		{!! Form::open(['route' => 'convenios.store','files' => 'true']) !!}
		{{Form::token()}}
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<input type="text" name="titulo" class="form-control">
							<label class="fg-label">Titulo</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<input type="text" name="codigo" class="form-control">
							<label class="fg-label">Codigo</label>
						</div>
						
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-mail-send"></i></span>
						<div class="fg-line">
							<input type="text" name="resolucion" class="form-control">
							<label class="fg-label">Resolución</label>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<br/>
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<input type="text" name="objetivo" class="form-control">
							<label class="fg-label">Objetivo</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<input type="text" name="duracion" class="form-control">
							<label class="fg-label">Duración</label>
						</div>
						
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-mail-send"></i></span>
						<div class="fg-line">
							<input type="text" name="categoria" class="form-control">
							<label class="fg-label">Categoria</label>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
						<div class="dtp-container fg-line">
							<input type="text" name="fecha_ini" class="form-control date-picker">
							<label class="fg-label">Fecha de inicio</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
						<div class="dtp-container fg-line">
							<input type="text" name="fecha_fin" class="form-control date-picker">
							<label class="fg-label">Fecha Final</label>
						</div>
						
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-mail-send"></i></span>
						<div class="fg-line">
							<select name="idtipo" class="selectpicker">
							@foreach ($ti as $t)
								<option value="{{$t->idtipo}}" selected>{{$t->nombre}}</option>
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
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<select name="idtipoconvenio" class="selectpicker">
							@foreach ($tc as $tc)
							<option value="{{$tc->idtipoconvenio}}" selected>{{$tc->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<select name="idambito" class="selectpicker">
							@foreach ($amb as $amb)
							<option value="{{$amb->idambito}}" selected>{{$amb->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<select class="chosen" name="idpais" data-placeholder="Pais" style="display: none;">
							@foreach ($pa as $pa)
								<option value="{{$pa->idpais}}">{{$pa->nombre}}</option>
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
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<select name="idestado" class="selectpicker" data-placeholder="Estado" style="display: none;">
							@foreach ($es as $es)
								<option value="{{$es->idestado}}">{{$es->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"></span>
						<div class="file-loading">
    						<input type="file" name="imagen"  multiple>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<button type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>
						</div>
					</div>
				</div>

			</div>
			{!! Form::close() !!}
			
		</div>

		<br/>
		

	</div>

</div>




@endsection