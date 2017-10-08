@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Ficha Convenio: {{$convenio->titulo}} <button class="btn btn-info waves-effect" data-toggle="modal"
                                                                      href="#modalDefault" data-target-color="bluegray" style="margin-left: 150px;">
                            <i class="zmdi zmdi-assignment-o"></i> Crear</button></h3>

                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="waves-effect"><a href="{{route('convenios.show',$convenio->idconvenio)}}">Información</a></li>
                        <li class="active waves-effect"><a href="{{route('convenios.img',$convenio->idconvenio)}}">Imagenes</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.ficha',$convenio->idconvenio)}}">Ficha</a></li>
                    </ul>

                    <div class="pm-body clearfix">

                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <br>


                                        <!--MODAL -->
                                    <div class="modal fade" data-modal-color="bluegray" id="modalDefault"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Subir Imagenes</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                                        <div>
                                                        <span class="btn btn-info btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="...">
                                                        </span>
                                                            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link">Guardar</button>
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@stop