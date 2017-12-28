@extends('principal2')
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('contents')

{!! Form::model($contrato, ['method' => 'PATCH', 'route'=>['contrato.update', $contrato->idcontrato] ]) !!}

<div class="card">
	<div class="card-body card-padding">
		<h3>Editando Contrato: {{$contrato->titulo}}</h3>
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
		<br>
		<div class="row">
			<div class="row">
                <div class="pm-body clearfix">
                    <div class="pmb-block">
                        <div class="pmbb-header">
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <div class="bs-item z-depth-5" style="min-height: 220px;">
                                        <h2>Archivos del Contrato <a  id="uploadfiles" class="btn btn-info" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target=".uploadfile">Subir Archivos</a></h2>
                                        <hr>
                                        @foreach($files as $file)
                                            <a onclick="view('{{url($file->patch.$file->imagen)}}')">
                                                <img width="90" src="/imagenes/{{$file->extencion}}.png">
                                                <a href="#" onclick="DeleteFile('{{$file->imagen}}')" id="delete" class="btn-danger btn" style="position: relative;left: -35px;top: -38px;">X</a>
                                                <small class="name-file">{{$file->filename}}</small>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
				<div class="col-sm-4">
					<div class="input-group">

						<span class="input-group-addon"><i class="zmdi zmdi-chevron-right"></i>
						</span>
						<div class="fg-line"><label class="fg-label">titulo</label>
							<input type="text" name="titulo" value="{{$contrato->titulo}}" class="form-control" placeholder="Titulo" >
							
						</div>
					</div>
				</div>

				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-chevron-right"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Codigo</label>	
							<input type="text" name="codigo" value="{{$contrato->codigo}}" class="form-control" placeholder="codigo">
							
						</div>
					</div>
				</div>
			
			<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-chevron-right"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Objeto</label>
							<input type="text" name="objeto" class="form-control" value="{{$contrato->objeto}}" placeholder="Objeto">
							
						</div>
					</div>
				</div>
			</div>	
			<br/>
			<br/>
			<div class="row">
				<!--<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-account"></i>
						</span>
						<div class="fg-line">
						<label class="fg-label">Objetivo</label>
							<input type="text" name="objetivo" class="form-control"
							value="" placeholder="Objetivo">
							
						</div>
					</div>
				</div>-->

				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-chevron-right"></i>
						</span>
						<div id="duracion_lavel" class="fg-line" >
						<label class="fg-label">Duración</label>
							<input type="text" id="duracion" name="duracion" class="form-control" value="{{$contrato->duracion}}" placeholder="Duración">
							
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-calendar-check"></i>
						</span>
						<div class="fg-line">
							<label class="fg-label">Fecha inicio</label>
							<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control date-picker"  value="{{$contrato->fecha_inicio}}" placeholder="Fecha Inicio">

						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-calendar-check"></i>
						</span>
						<div class="fg-line">
							<label class="fg-label">Fecha Vencimiento</label>
							<input type="text" id="fecha_fin" name="fecha_fin" class="form-control date-picker" value="{{$contrato->fecha_fin}}" placeholder="Fecha Vencimiento">

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
							<i class="zmdi zmdi-chevron-right"></i>
						</span>
						<div class="fg-line">
							<label class="fg-label">Categoria</label>
							<select name="categoria[]" class="chosen" multiple data-placeholder="Categoria">
								<option disabled >Seleccionar Categorias</option>
								@php
									$exist = array()
								@endphp
								@foreach($cat as $cate)
									@foreach($CCon as $con)
										@if($cate->idcategoria == $con->categoria->idcategoria)
											<option selected value="{{$con->categoria->idcategoria}}">{{$con->categoria->nombre}}</option>
											{{array_push($exist,$con->categoria->idcategoria)}}
										@endif
									@endforeach
									@if(!in_array($cate->idcategoria,$exist))
										<option value="{{$cate->idcategoria}}" >{{$cate->nombre}}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>
				</div>
                <div class="col-sm-4">
                    <div class="input-group">
						<span class="input-group-addon">
							<i class="zmdi zmdi-chevron-right"></i>
						</span>

                        <div class="fg-line">
                            <label class="fg-label">Ambito</label><br>
                            <select name="idambito" class="selectpicker">
                                @foreach ($amb as $am)
                                    @if($am->idambito == $contrato->ambito_idambito)
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
						<i class="zmdi zmdi-chevron-right"></i>
					</span>

                        <div class="fg-line">
                            <label class="fg-label">Pais</label><br>
                            <select name="idpais" class="selectpicker">
                                @foreach ($pa as $pa)
                                    @if($pa->idpais == $contrato->pais_idpais)
                                        <option value="{{$pa->idpais}}" selected>{{$pa->nombre}}</option>
                                    @else
                                        <option value="{{$pa->idpais}}">{{$pa->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
			</div>
			<br>
			<br>
			</div>
			<br>
			<br>
			<div class="row">
				
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="zmdi zmdi-chevron-right"></i>
					</span>

					<div class="fg-line">
						<label class="fg-label">Estado</label><br>
						<select name="idestado" class="selectpicker">
							@foreach ($es as $es)
							@if($es->idestado == $contrato->estado_idestado)
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
            </div>
                <br>
                <br>
                <div class="row">
                    <button type="submit" class="btn palette-Red-600 bg btn-block"><i class="zmdi zmdi-check"></i></button>
                </div>
		</div>
	</div>
</div>



{!! Form::close() !!}
<style>
    .modal-dialog {
        width: 80%;
        height: 100%;

    }

    .modal-content {
        height: auto;
        min-height: 80%;
        border-radius: 0;
    }
    .name-file{
        position: relative;
        left: -83px;
        top: 65px;
    }
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

</style>
    <div style="background: rgba(0,0,0,0.3)" class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div style="background: rgba(0,0,0,0.3)" class="modal-content">
            <!-- Header -->
            <div id="confirmacao-label1">
                <a href="#close" title="Close" data-dismiss="modal" class="closeModal">X</a>
            </div>
            <!-- End header -->
            <div style="background: rgba(0,0,0,0.3)" class="modal-body">
                <div class="embed-responsive embed-responsive-4by3" id="modal-embed">
                    <iframe id="iframe" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade uploadfile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="panel">
                    <div class="panel-heading">

                    </div>
                    <div style="padding: 10px;margin: 5px;">
                        <form action="{{ url('/contrato/fileUpload') }}" class="dropzone" id="my-awesome-dropzone">
                            {{ csrf_field() }}
                            <input id="idContrato" type="hidden" name="idContrato" value="{{$contrato->idcontrato}}">
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
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script>
        var file_up_names = [];
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file",
            maxFilesize: 100,
            addRemoveLinks: true,
            dictRemoveFile: 'Eliminar',
            success: function (file,response) {
                var fn = file.name;
                file_up_names.push(file.name);
                $(file.previewElement).find('[data-dz-name]').html(fn);
                $('#files_ids').append('<input type="hidden" name="files[]" value="'+response+'" id="'+file.name.trim().replace(".","")+'">')
            },
            removedfile: function(file) {
                x = confirm('Deseas eliminar este archivo ?');
                if (!x) return false;
                for (var i = 0; i < file_up_names.length; ++i) {
                    if (file_up_names[i] == file.name) {
                        $.ajax({
                            type: 'POST',
                            url: '/contrato/fileDelete',
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
            $('#fecha_inicio').data("DateTimePicker").maxDate(e.date);
            CalcDiff()
        });

        function CalcDiff() {
            var a = $('#fecha_inicio').data("DateTimePicker").date();
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
            location.reload();
        });
        $('#confirmModal').click(function () {
            $('.uploadfile').modal('hide');
            location.reload();
        })

    </script>
    <script>
        function view(url) {

            $('#iframe').attr("src",url);

            $('#viewModal').modal({show:true})
        }

        function DeleteFile(file) {
            var confr = confirm('Desea eliminar el archivo ?');
            if(confr){
                $.ajax({
                    url:'/contrato/fileDelete',
                    method:'post',
                    data:{image:file},
                    success:function (d) {
                        location.reload();
                    }
                })
            }

        }
    </script>
@endsection