@extends('.layouts.app')

@section('title', 'Información de comisiones')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Información de comisiones parlamentarias</div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Nombre: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$commission->name}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Descripcion: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$commission->description}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Fecha de creacion: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$commission->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection