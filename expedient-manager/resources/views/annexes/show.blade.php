@extends('.layouts.app')

@section('title', 'Detalles de anexos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Detalles de anexos</div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Nro.: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$annex->nroAnnex}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Título: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$annex->title}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Tipo: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$annex->type}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Contenido: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$annex->content}}</p>
                            </div>
                            <div class="row">
                                <a role="button" class="btn btn-primary float-right"
                                   style="position: relative;right: -90%;"
                                   href="{{ action('AnnexController@edit', ['id' => $annex->id]) }}">Editar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection