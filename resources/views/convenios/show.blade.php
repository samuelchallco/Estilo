@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Información Convenio: {{$convenio->titulo}}</h3>
                    <br>
                </div>
                <div class="pm-body clearfix">
                    <ul class="tab-nav tn-justified">
                        <li class="active waves-effect"><a href="{{route('convenios.show',$convenio->idconvenio)}}">Información</a></li>
                        <li class="waves-effect"><a href="">Imagenes de Convenio</a></li>
                        <li class="waves-effect"><a href="{{route('convenios.ficha',$convenio->ficha_idficha)}}">Ficha</a></li>
                    </ul>

                    <div class="pm-body clearfix">


                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2 style="margin-left: 5px;"><i class="zmdi zmdi-phone m-r-5"></i> Info convenio</h2>

                            </div>
                        </div>
                    </div>
                </div>




                </div>
            </div>
        </div>
    </section>



@stop