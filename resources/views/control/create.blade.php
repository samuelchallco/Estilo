@extends('principal2')
@section('contents')
	

<div class="card">
	<div class="card-body card-padding">
		<h3>Crear Accesos</h3>
		@if(count($errors) > 0)
		<div class="errors">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<br>
		<div class="row">
		{!! Form::open(['route' => 'control.store']) !!}
		{{Form::token()}}
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<select name="idconvenio" class="selectpicker" data-placeholder="convenio" style="display: none;">
							@foreach ($con as $con)
								<option value="{{$con->idconvenio}}">{{$con->titulo}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<select name="idresponsable" class="selectpicker" data-placeholder="responsable" style="display: none;">
							@foreach ($res as $res)
								<option value="{{$res->idresponsable}}">{{$res->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<select name="idusuario" class="selectpicker" data-placeholder="usuario" style="display: none;">
							@foreach ($us as $us)
								<option value="{{$us->idusuario}}">{{$us->nombre}}</option>
							@endforeach
							</select>
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
							<input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}" class="form-control">
							<label class="fg-label">Descripción</label>
							
						</div>
					</div>
				</div>
			<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<button id="enviar" type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>
						</div>
					</div>
				</div>
			</div>
				
			</div>
			
			{!! Form::close() !!}
			
		</div>

		<br/>
		

	</div>

@endsection