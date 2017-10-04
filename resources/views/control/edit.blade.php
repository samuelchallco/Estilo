@extends('principal2')
@section('contents')

{!! Form::model($control, ['method' => 'PATCH', 'route'=>['control.update', $control->idcontrol] ]) !!}

<div class="card">
	<div class="card-body card-padding">
		<h3>Editando Control: {{$control->titulo}}</h3>
		<br>
		@if(count($errors) > 0)
		<div class="errors">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif	
		<div class="row">
			<div class="row">
				<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">
						<label class="fg-label">Convenio</label>
						<select name="idconvenio" class="selectpicker">
							@foreach ($convenio as $con)
							@if($con->idconvenio == $control->convenio_idconvenio)
							<option value="{{$con->idconvenio}}" selected>{{$con->titulo}}</option>
							@else
							<option value="{{$con->idconvenio}}">{{$con->titulo}}</option>
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
						<label class="fg-label">Reponsable</label>
						<select name="idresponsable" class="selectpicker">
							@foreach ($responsable as $res)
							@if($res->idresponsable == $control->responsable_idresponsable)
							<option value="{{$res->idresponsable}}" selected>{{$res->nombre}}</option>
							@else
							<option value="{{$res->idresponsable}}">{{$res->nombre}}</option>
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
						<label class="fg-label">Usuario</label>
						<select name="idusuario" class="selectpicker">
							@foreach ($usuario as $us)
							@if($us->idusuario == $control->usuario_idusuario)
							<option value="{{$us->idusuario}}" selected>{{$us->nombre}}</option>
							@else
							<option value="{{$us->idusuario}}">{{$us->nombre}}</option>
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
					<div class="input-group fg-float">

						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Descripción</label>
							<input type="text" name="descripcion" value="{{$control->descripcion}}" class="form-control">
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<button type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>
				</div>
					
			</div>	
			
		
	</div>
</div>

</div>

{!! Form::close() !!}
@endsection