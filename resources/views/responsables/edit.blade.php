@extends('principal2')
@section('contents')

{!! Form::model($responsable, ['method' => 'PATCH', 'route'=>['responsables.update', $responsable->idresponsable] ]) !!}

<div class="card">
	<div class="card-body card-padding">
		<h3>Editando Responsable: {{$responsable->nombre}}</h3>
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
					<div class="input-group fg-float">

						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
							<label class="fg-label">Nombre</label>
							<input type="text" name="nombre" value="{{$responsable->nombre}}" class="form-control">
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group fg-float">

						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Descripción</label>
							<input type="text" name="descripcion" value="{{$responsable->descripcion}}" class="form-control">
							
						</div>
					</div>
				</div>

				<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-account"></i>
					</span>

					<div class="fg-line">
						<label class="fg-label">Estado</label>
						<select name="idestado" class="selectpicker">
							@foreach ($estado as $es)
							@if($es->idestado == $responsable->estado_idestado)
							<option value="{{$es->idestado}}" selected>{{$es->nombre}}</option>
							@else
							<option value="{{$es->idestado}}">{{$es->nombre}}</option>
							@endif
							@endforeach
						</select>

					</div>
				</div>

			</div>
			</div>
			<br>
			
			<br>	
			<button type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>
		</div>
	</div>
</div>

</div>

{!! Form::close() !!}
@endsection