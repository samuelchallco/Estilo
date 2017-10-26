@extends('principal2')
@section('contents')


    <section id="content">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h3>Ficha Convenio: {{$convenio->titulo}}</h3>

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
                                        <div class="bs-item z-depth-5" style="min-height: 220px;">
                                            <h2>Archivos del Convenio</h2>
                                            @foreach($files as $file)
                                                <a onclick="view('{{url($file->imagen)}}')">
                                                    <img width="100" src="/imagenes/{{$file->extencion}}.png">
                                                    <small class="name-file">name.jpg</small>
                                                </a>
                                            @endforeach
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
@endsection
@section('script')
  <script>
      function view(url) {

              $('#iframe').attr("src",url);

          $('#viewModal').modal({show:true})
      }
  </script>
@endsection