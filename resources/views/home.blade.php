@extends('principal2')

@section('contents')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="col-md-3 col-md-offset-1">
                        <div class="card popular-post">
                            <div class="card-header ch-img" style="background-image: url(/imagenes/convenios/fondo.jpg); height: 150px;">
                                <h2>Convenios <small>Lista de convenios registrados en el sitema</small></h2>

                                <a href="{{url('convenios/create')}}" class="btn palette-Light-Green bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-plus"></i></a>
                            </div>
                            <div class="card-body m-t-20">
                                <div class="list-group lg-alt">
                                    <a href="#" class="list-group-item media">
                                        <div class="pull-left">
                                            <img width="65" class="" src="/imagenes/contract.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h1 class="lgi-heading">29</h1>
                                            <small class="lgi-text">Activos</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item media">
                                        <div class="pull-left">
                                            <img width="65" class="" src="/imagenes/contract.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h1 class="lgi-heading">24</h1>
                                            <small class="lgi-text">Tramite</small>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item media">
                                        <div class="pull-left">
                                            <img width="65" class="" src="/imagenes/contract.png" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h1 class="lgi-heading">39</h1>
                                            <small class="lgi-text">Vencidos</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
