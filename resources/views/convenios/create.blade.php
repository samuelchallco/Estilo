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
    .modal  {
        /*   display: block;*/
        padding-right: 0px;
        background-color: rgba(4, 4, 4, 0.8);
    }

    .modal-dialog {
        top: 20%;
        width: 100%;
        position: absolute;
    }
    .modal-content {
        border-radius: 0px;
        border: none;
        top: 40%;
    }

</style>
<div class="card">
	<div class="card-body card-padding">
		<h3 style="margin-top: -20px;">Crear Convenio</h3>
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
                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                        <div class="fg-line">
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
                            <label class="fg-label">INSTITUCIÓN EXTERNA</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="input-group fg-float">
                        <span class="input-group-addon"><i class="zmdi zmdi-accounts"></i></span>
                        <div class="fg-line">
                            <select name="responsable[]" class="chosen" multiple data-placeholder="Responsables">
                                <option disabled >Seleccionar Responsables *</option>
                                @foreach($res as $res)
                                    <option value="{{$res->idresponsable}}">{{$res->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <br>
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div class="fg-line">
							<input type="text" name="titulo" class="form-control" value="{{old('titulo')}}">
							<label class="fg-label">Título *</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div class="fg-line">
							<input type="text" id="registro1" name="codigo" class="form-control" value="{{old('codigo')}}">
							<label class="fg-label">N° de Registro Interno *</label>
						</div>

					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div class="fg-line">
							<input type="text" id="resolucion1" name="resolucion" class="form-control" value="{{old('resolucion')}}">
							<label class="fg-label">N° de Resolución</label>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<br/>
			<div class="row">
				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div class="fg-line">
							<input type="text" name="objetivo" class="form-control" value="{{old('objetivo')}}">
							<label class="fg-label">Objetivo *</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div id="duracion_lavel" class="fg-line">
							<input id="duracion" type="text" name="duracion" class="form-control" value="{{old('duracion')}}">
							<label class="fg-label">Duración</label>
						</div>

					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div class="fg-line">
							<select name="categoria[]" class="chosen" multiple data-placeholder="Categoría" >
                                <option disabled>Seleccionar Categorías *</option>
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
							<label class="fg-label">Fecha de Inicio *</label>
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
					<span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
						<div class="dtp-container fg-line">
							<input id="fecha_fin" type="text" name="fecha_final" class="form-control date-picker" value="{{old('fecha_final')}}">
							<label class="fg-label">Fecha de Vencimiento </label>
						</div>

					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group fg-float">
						<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
						<div class="fg-line">
							<select name="idtipo" class="selectpicker" data-placeholder="Tipo">
								<option disabled selected>Tipo de Convenio *</option>
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
							<select id="ambito" name="idambito" class="selectpicker" data-placeholder="Ambito">
								<option disabled selected>Ámbito</option>
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
                <div class="col-sm-4">
                    <div class="input-group fg-float">
                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                        <div class="fg-line">
                            <select name="idestado" class="selectpicker" data-placeholder="Estado" style="display: none;">
                                @foreach ($es as $es)
                                    <option value="{{$es->idestado}}" >{{$es->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
			</div>
			<br>
			<br>
			<div class="row">
			</div>
            <h3>Crear Ficha del Convenio</h3>
            <br>
            <div class="row">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row" style="margin-left: 15px;">
                            <div class="col-sm-4">
                                <div class="input-group fg-float">
                                    <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <div class="fg-line">
                                        <label class="fg-label">N° Resolución</label>
                                        <input type="text" id="resolucion2" name="num_resolucion" class="form-control" value="{{old('num_resolucion')}}">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group fg-float">
                                    <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <div class="fg-line">
                                        <label class="fg-label">N° Registro</label>
                                        <input type="text" id="registro2" name="num_registro" class="form-control" value="{{old('num_registro')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="input-group fg-float">
                                    <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                    <div class="fg-line">
                                        <label class="fg-label">Ámbito</label>
                                        <input type="text" id="ambito2" name="ambito" class="form-control" value="{{old('ambito')}}">
                                    </div>
                                </div>
                            </div>

                            <!--<div class="col-sm-4">
                                <div class="input-group fg-float">
                                    <span class="input-group-addon"><i class="zmdi zmdi-my-location"></i></span>
                                    <div class="fg-line">
                                        <select id="ambito2" name="ambito" class="selectpicker" data-placeholder="Ambito">
                                            <option disabled selected>Seleccionar Ambito</option>
                                            @foreach ($am as $am)
                                                <option value="{{$am->idambito}}">{{$am->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <br>
                        <div class="row" style="margin-left: 15px;">
                            <div class="row col-sm-6">
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                        <div class="fg-line">
                                            <input type="text" id="nombre_ins" name="nombre_ins" class="form-control" value="{{old('nombre_ins')}}">
                                            <label class="fg-label">Nombre de la Institución Externa</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="sector" class="form-control" value="{{old('sector')}}">
                                            <label class="fg-label">RUC</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
                                            <label class="fg-label">Dirección de la Institución Externa</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h5 style="color: #880e4f; font-weight: bold;">Coordinadores Insterinstitucionales</h5>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="nombre_coor" class="form-control" value="{{old('nombre_coor')}}">
                                            <label class="fg-label">Nombre Coordinador de la Institución Externo</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="telefono_coor" class="form-control" value="{{old('telefono_coor')}}">
                                            <label class="fg-label">Telefono del Coordinador de la Institución Externo</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="email_coor" class="form-control" value="{{old('email_coor')}}">
                                            <label class="fg-label">Email del Coordinador de la Institución Externo</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--MITAD DERECHAAAAA-->
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="row col-sm-6" style="margin-left: 15px;">
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="nom_area" class="form-control" value="{{old('nom_area')}}">
                                            <label class="fg-label">Nombre del Coordinador de la UPeU</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="coor_area" class="form-control" value="{{old('coor_area')}}">
                                            <label class="fg-label">Cargo del Coordinador de la UPeU</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}">
                                            <label class="fg-label">Télefono del Coordinador de la UPeU</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                            <label class="fg-label">Email del Coordinador de la UPeU</label>
                                        </div>
                                    </div>
                                </div>                                <br>
                                <br>
                            </div>
                        </div>
                                <h3 style="margin-left: 20px;">Subir Archivos del Convenio<strong></strong> </h3>
                        <div class="col-sm-11">

                                    <div class="input-group fg-float">
                                        <span class="input-group-addon"><i class="zmdi zmdi-files"></i></span>
                                        <div class="fg-line">
                                            <a  id="uploadfiles" class="btn btn-info btn-block"
                                                data-backdrop="static" data-keyboard="false" data-toggle="modal"
                                                data-target=".uploadfile">Subir Archivos</a>
                                        </div>
                                    </div>
                        </div>
                                <div id="files_ids">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <br>
            <div class="col-sm-11">
                <div class="input-group fg-float">
                    <span class="input-group-addon"></span>
                    <div class="fg-line">
                        <button type="submit" class="btn palette-Red-600 bg btn-block" ><i class="zmdi zmdi-check"></i> Crear Convenio</button>
                    </div>
                </div>
            </div>
            <br/>

			{!! Form::close() !!}
            <div class="modal fade uploadfile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-heading">

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
                        </div>
                        <div class="modal-footer">
                            <a id="closeModal" class="btn btn-danger btn-lg">Cancelar</a>
                            <a id="confirmModal" class="btn btn-success btn-lg">Confirmar</a>
                        </div>
                    </div>
                </div>
            </div>


		</div>



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
            dictRemoveFile: 'Eliminar',
            success: function (file,response) {
                var fn = file.name;
                file_up_names.push(file.name);
                $(file.previewElement).find('[data-dz-name]').html(fn);
                $('#files_ids').append('<input type="hidden" name="files[]" value="'+response+'" id="'+file.name.trim().replace(".","")+'">')
            },
            removedfile: function(file) {
                x = confirm('Deseas eliminar esta archivo ?');
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
            var mes = Math.floor(Dias/(30));
            var anio = Math.floor(mes/12);
            var val ='';
            if(anio>0){
                if(anio == 1){
                    val=+anio+' año'
                }else{
                    val=+anio+' años'
                }
            }else if(mes >0){
                if(mes == 1){
                    val =+ mes+' mes'
                }else{
                    val =+ mes+' meses'
                }
            }else if(Dias<31){
                val =+Dias+' dias'
            }
            $('#duracion_lavel').addClass('fg-toggled');
            $('#duracion').val(val)
        }


        $('#uploadfiles').click(function (e) {
            e.preventDefault();
        });
        $('#closeModal').click(function () {
            $('.uploadfile').modal('hide');
            $('#files_ids').empty();
        });
        $('#confirmModal').click(function () {
            $('.uploadfile').modal('hide');
        })

        $(document).ready(function () {
            $('#nombre').keyup(function () {
                var value = $(this).val();
                $('#nombre_ins').val(value);
            });
            $('#resolucion1').keyup(function () {
                var value = $(this).val();
                $('#resolucion2').val(value);
            });
            $('#registro1').keyup(function () {
                var value = $(this).val();
                $('#registro2').val(value);
            });
            $('#ambito').change(function () {
                var val = $(this).val();
                if (val==2){
                    val='Nacional';
                    $('#ambito2').val(val);
                }else {
                    val='Internacional'
                    $('#ambito2').val(val);
                }

            });
        });
	</script>
	@endsection