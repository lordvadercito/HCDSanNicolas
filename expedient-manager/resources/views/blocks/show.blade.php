@extends('.layouts.app')

@section('title', 'Informacion de bloques')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Informacion de bloques concejales</div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Nombre: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$block->name}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Descripcion: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$block->description}}</p>
                            </div>
                            <div class="row">
                                <p class="col-xs-5 float-left space-50 text-right font-weight-bold" style="width: 50%;">
                                    Fecha de creacion: &nbsp;</p>
                                <p class="col-xs-5 float-right space-50 text-left"
                                   style="width: 50%;">{{$block->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection