@extends('.layouts.app')

@section('title', 'Detalles de notas e informes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Detalles de notas e informes</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Nro.: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$note->nro}}
                                        / {{substr($note->creation_date, 0, 4)}}</p>
                                </div>
                                <div class="col">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Tipo:&nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$note->type == 'N' ? 'Nota' : 'Informe'}}</p>
                                </div>
                                <div class="col">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Dirección:&nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$note->direction == 'E' ? 'Entrada' : 'Salida'}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Creación:&nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$note->creation_date}}</p>
                                </div>
                                <div class="col">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Usuario:&nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$note->users->name}}</p>
                                </div>
                                <div class="col">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Origen:&nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$note->origin}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="float-left text-center font-weight-bold" style="width: 50%;">
                                       Solicitado en el expediente:&nbsp;</p>
                                    <p class="float-right text-center"
                                       style="width: 50%;">{{$note->expedients->expedientNro}}
                                        / {{substr($note->expedients->creation_date, 0, 4)}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="float-left text-center font-weight-bold">
                                        Descripción:&nbsp;</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-justify">{{$note->description}}</p>
                                </div>

                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="{{route("notes.index")}}" role="button"
                                       class="btn btn-link float-left">Volver</a>
                                </div>
                                <div class="col">

                                    <a role="button" class="btn btn-primary float-right"
                                       href="{{ action('NoteController@index', ['id' => $note->id]) }}">Editar
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
