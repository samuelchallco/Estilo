@extends('principal2')
@section('contents')
	

<div class="card">
	<div class="card-body card-padding">
		<h3>Crear Responsable</h3>
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
		{!! Form::open(['route' => 'responsables.store']) !!}
		{{Form::token()}}
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="form-control">
							<label class="fg-label">Nombre</label>
							
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}">
							<label class="fg-label">Descripción</label>
							
						</div>
						
					</div>
				</div>

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
			</div>
			<br/>
			<br/>
			<div class="row">
			
			<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class=""></i></span>
						<div class="fg-line">
							<button id="enviar" type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
			
		</div>

		<br/>
		

	</div>





@endsection