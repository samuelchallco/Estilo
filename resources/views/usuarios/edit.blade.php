@extends('principal2')
@section('contents')

{!! Form::model($usuario, ['method' => 'PATCH', 'route'=>['usuarios.update', $usuario->idusuario] ]) !!}

<div class="card">
	<div class="card-body card-padding">
		<h3>Editando usuario: {{$usuario->nombre}}</h3>
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
							<input type="text" name="nombre" value="{{$usuario->nombre}}" class="form-control">
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group fg-float">

						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Email</label>
							<input type="text" name="correo" value="{{$usuario->correo}}" class="form-control">
							
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<label class="fg-label">Password</label>
							<input type="text" name="password" value="***************" class="form-control">
							
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
						<label class="fg-label">Rol</label>
						<select name="idrol" class="selectpicker">
							@foreach ($rol as $rol)
							@if($rol->idrol == $usuario->rol_idrol)
							<option value="{{$rol->idrol}}" selected>{{$rol->tipo}}</option>
							@else
							<option value="{{$rol->idrol}}">{{$rol->tipo}}</option>
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
						<label class="fg-label">Estado</label>
						<select name="idestado" class="selectpicker">
							@foreach ($estado as $es)
							@if($es->idestado == $usuario->estado_idestado)
							<option value="{{$es->idestado}}" selected>{{$es->nombre}}</option>
							@else
							<option value="{{$es->idestado}}">{{$es->nombre}}</option>
							@endif
							@endforeach
						</select>

					</div>
				</div>

			</div>
			<br>	
			<button type="submit" class="btn palette-Red-600 bg"><i class="zmdi zmdi-check"></i></button>
		</div>
	</div>
</div>

</div>

{!! Form::close() !!}
@endsection