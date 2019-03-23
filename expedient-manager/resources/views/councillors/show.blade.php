@extends('.layouts.app')

@section('title', 'Informacion de concejales')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Informacion de concejales</div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Nombre: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$councillor->name}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Apellido: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$councillor->surname}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Bloque: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$councillor->block->name}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Comision: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$councillor->commission->name}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Inicio de mandato: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$councillor->start_of_mandate}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Fin de mandato: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$councillor->end_of_mandate}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
