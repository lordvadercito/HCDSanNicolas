@extends('.layouts.app')

@section('title', 'Movimientos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-xs-12">
                    <div class="card">
                        <div class="card-header">Ruta del expediente {{$movements->first()->expedients->expedientNro}}
                            / {{substr($movements->first()->expedients->creation_date, 0, 4)}}</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Expediente</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Nro. de Pase</th>
                                    <th scope="col">Foja</th>
                                    <th scope="col">Usuario de origen</th>
                                    <th scope="col">En tablas</th>
                                    <th scope="col">Fecha</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movements as $movement)
                                    <tr>

                                        <td>{{$movement->expedients->expedientNro}}
                                            / {{substr($movement->expedients->creation_date, 0, 4)}}</td>
                                        <td>{{$movement->origin}}</td>
                                        <td>{{$movement->destination}}</td>
                                        <td>{{$movement->movement_nro}}</td>
                                        <td>{{$movement->foja}}</td>
                                        <td>{{$movement->users->name}}</td>
                                        @if($movement->in_table == 0)
                                            <td>No</td>
                                        @else
                                            <td>Si</td>
                                        @endif
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
        <br>
        <hr>
        <br>
        <div class="row text-center justify-content-center">
{{--            {{ $movements->links() }}--}}
        </div>
        </div>
    </main>
@endsection
