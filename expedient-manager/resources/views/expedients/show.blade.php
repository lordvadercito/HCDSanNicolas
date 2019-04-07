@extends('.layouts.app')

@section('title', 'Detalles de expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Detalles de expediente</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Nro.Expediente: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->expedientNro}}
                                        / {{substr($expedient->creation_date, 0, 4)}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Nro.Expediente D.E.:&nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->expedientDENro}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Tipo de proyecto: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->projectType}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Tema: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->subject}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Tema secundario: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->secondary_subjet}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Estado: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->state}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Caratula: &nbsp;</p>
                            </div>
                            <div class="row">
                                <p class="text-justify" style="width: 90%; margin: 0 10%;"
                                >{{$expedient->cover}}</p>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Archivado: &nbsp;</p>
                                    @if($expedient->archived == 0)
                                        <p class="float-right space-50 text-left"
                                           style="width: 50%;">No</p>
                                    @else
                                        <p class="float-right space-50 text-left"
                                           style="width: 50%;">Si</p>
                                    @endif
                                </div>
                                <div class="col-sm-4">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Reg. de ingreso: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->incomeRecord}}</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="col-xs-4 float-left space-50 text-right font-weight-bold"
                                       style="width: 50%;">
                                        Reg. de tratamiento:&nbsp;</p>
                                    <p class="col-xs-4 float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->treatmentRecord}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Origen: &nbsp;</p>
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">{{$expedient->origin}}</p>
                                </div>

                                <div class="col-sm-6">
                                    <p class="float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                        Ubicación actual: &nbsp;</p>
                                    <!--TODO: Definir e implementar método para mostrar ubicación actual-->
                                    <p class="float-right space-50 text-left"
                                       style="width: 50%;">A definir</p>
                                </div>
                            </div>
                            <div class="row">
                                <p class="col-sm-12 text-center font-weight-bold">
                                    Anexos vinculados: &nbsp;</p>
                            </div>
                            <div class="list-group" style="width: 90%;margin: 0 5%">
                                @foreach($expedient->annexes as $annexes)
                                    <a href="{{ action('AnnexController@show', ['id' => $annexes->id]) }}"
                                       class="list-group-item list-group-item-action text-center">{{$annexes->nroAnnex . " - " . $annexes->title ." - ". $annexes->type}}</a>
                                @endforeach
                            </div>

                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="{{route("expedients.index")}}" role="button"
                                       class="btn btn-link float-left">Volver</a>
                                </div>
                                <div class="col-sm-4">
                                    <a role="button" class="btn btn-success"
                                       href="{{ action('MovementController@create', ['id' => $expedient->id, 'expedientNro' => $expedient->expedientNro ]) }}">Mover
                                        expediente
                                    </a>
                                    <a role="button" class="btn btn-primary float-right"
                                       href="{{ action('ExpedientController@edit', ['id' => $expedient->id]) }}">Editar
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
