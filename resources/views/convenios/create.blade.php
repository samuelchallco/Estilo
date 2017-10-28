@extends('principal2')
@section('header')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('contents')
<style>
	.dropzone {
		border: 2px dashed purple;
		border-radius: 5px;
		background: white;
	}
</style>
<div class="card">
	<div class="card-body card-padding">
		<h3>Crear Convenio</h3>
		<p id="sms_time"></p>
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
		{!! Form::open(['route' => 'convenios.store','files' => 'true']) !!}
		{{Form::token()}}
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
						<div class="fg-line">
							<input type="text" name="titulo" class="form-control" value="{{old('titulo')}}">
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
							<select class="chosen" multiple data-placeholder="Categoria">
								@foreach($cat as $ca)
								<option value="{{$ca->idcategoria}}">{{$ca->nombre}}</option>
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
						<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
						<div class="dtp-container fg-line">
							<input id="fecha_ini" type="text" name="fecha_inicio" class="form-control date-picker" value="{{old('fecha_inicio')}}">
							<label class="fg-label">Fecha de inicio</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
						<div class="dtp-container fg-line">
							<input id="fecha_fin" type="text" name="fecha_final" class="form-control date-picker" value="{{old('fecha_final')}}">
							<label class="fg-label">Fecha Final</label>
						</div>
						
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-mail-send"></i></span>
						<div class="fg-line">
							<select name="idtipo" class="selectpicker" data-placeholder="Tipo">
								<option disabled selected>Seleccionar Tipo</option>
							@foreach ($ti as $t)
								<option value="{{$t->idtipo}}" >{{$t->nombre}}</option>
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
					<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
						<div class="fg-line">
							<select name="idambito" class="selectpicker" data-placeholder="Ambito">
								<option disabled selected>Seleccionar Ambito</option>
							@foreach ($amb as $amb)
								<option value="{{$amb->idambito}}">{{$amb->nombre}}</option>
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
								<option value="{{$es->idestado}}" >{{$es->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
				<!--<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"></span>
						<div class="file-loading">
							<input type="file" name="imagen">
						</div>
					</div>
				</div>-->
				<hr>

			</div>
			{!! Form::close() !!}
			<div class="panel">
				<div class="panel-heading">
						<h3 class="panel-title text-center">Subir Archivos del Convenio<strong></strong> </h3>
				</div>
				<div style="padding: 10px;margin: 5px;">
					<form action="{{ url('/convenio/fileUpload') }}" class="dropzone" id="my-awesome-dropzone">
						{{ csrf_field() }}
						<div class="dz-message needsclick">
							Soltar archivos aquí o haga clic para cargar.
						</div>
					</form>
				</div>
			</div>

			<hr>
			<div class="panel-heading">
				<h3 class="panel-title text-center">Crear Ficha del Convenio<strong></strong> </h3>
			</div>
			<div class="row">
				<div class="row">
					<div class="col-sm-12">

						<div class="row" style="margin-left: 15px;">
							<div class="col-sm-4">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<label class="fg-label">N° Resolución</label>
										<input type="text" name="num_resolucion" class="form-control" value="">
									</div>

								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<label class="fg-label">N° Registro</label>
										<input type="text" name="num_registro" class="form-control" value="">
									</div>

								</div>
							</div>


							<div class="col-sm-4">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
												<input type="text" name="ambito" value="" class="form-control">
									</div>

								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="nombre_ins" class="form-control">
										<label class="fg-label">Nombre Institución</label>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="sector" class="form-control">
										<label class="fg-label">Sector</label>
									</div>

								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="direccion" class="form-control">
										<label class="fg-label">Dirección</label>
									</div>

								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="nombre_coor" class="form-control">
										<label class="fg-label">Nombre Coordinador</label>
									</div>

								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="telefono_coor" class="form-control">
										<label class="fg-label">Telefono Coordinador</label>
									</div>

								</div>
							</div>

							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="email_coor" class="form-control">
										<label class="fg-label">Email Coordinador</label>
									</div>

								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="nom_area" class="form-control">
										<label class="fg-label">Nombre Área</label>
									</div>

								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="coor_area" class="form-control">
										<label class="fg-label">Coordinador Área</label>
									</div>

								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="telefono" class="form-control">
										<label class="fg-label">Télefono</label>
									</div>

								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<input type="text" name="email" class="form-control">
										<label class="fg-label">Email</label>
									</div>

								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group fg-float">
									<span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
									<div class="fg-line">
										<label class="fg-label">Convenio</label>
										<input type="text" name="convenio_idconvenio" class="form-control" value="">
									</div>

								</div>
							</div>
						</div>
						<br/>
					</div>
				</div>
			</div>
			
		</div>

		<div class="col-sm-11">
			<div class="input-group fg-float">
				<span class="input-group-addon"></span>
				<div class="fg-line">
					<button type="submit" class="btn palette-Red-600 bg btn-block"><i class="zmdi zmdi-check"></i></button>
				</div>
			</div>
		</div>
		<br/>
		

	</div>

</div>

@endsection
@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
	<script>
        var file_up_names = [];
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file",
            maxFilesize: 9,
            addRemoveLinks: true,
            dictRemoveFile: '<i>Eliminar</i>',
            success: function (file) {
                var fn = file.name;
                file_up_names.push(file.name);

                $(file.previewElement).find('[data-dz-name]').html(fn);
            },
            removedfile: function(file) {
                x = confirm('Do you want to delete this logo?');
                if (!x) return false;
                for (var i = 0; i < file_up_names.length; ++i) {
                    if (file_up_names[i] == file.name) {
                        $.ajax({
                            type: 'POST',
                            url: '/convenio/fileDelete',
                            data: {"file_name" : file_up_names[i]},
                            dataType: 'html'
                        });
                        Dropzone.options.myAwesomeDropzone.maxFiles = Dropzone.options.myAwesomeDropzone.maxFiles + 1;
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
                }
            }
        };

        $("#fecha_fin").on("dp.change", function (e) {
            $('#fecha_ini').data("DateTimePicker").maxDate(e.date);
            CalcDiff()
        });

        function CalcDiff() {
            var a = $('#fecha_ini').data("DateTimePicker").date();
            var b = $('#fecha_fin').data("DateTimePicker").date();
            var timeDiff = 0
            if (b) {
                timeDiff = (b - a) / 1000;
            }
            var Dias = Math.floor(timeDiff / (60 * 60 * 24));
            $('#sms_time').html('El tiempo de duracion del convenio es de <strong>'+Dias+'</strong> dias ¡')
        }
	</script>
	@endsection