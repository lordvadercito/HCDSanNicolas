@extends('.layouts.app')

@section('title', 'Movimientos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Movimientos de expedientes</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Expediente</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Tipo de movimiento</th>
                                    <th scope="col">Usuario de origen</th>
                                    <th scope="col">Usuario receptor</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movements as $movement)
                                    <tr>
                                        <td>{{$movement->expedients}}</td>
                                        <td>{{$movement->origin}}</td>
                                        <td>{{$movement->destination}}</td>
                                        <td>{{$movement->movementType}}</td>
                                        <td>{{$movement->user}}</td>
                                        <td>{{$movement->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
