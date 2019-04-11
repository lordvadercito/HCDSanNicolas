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


                        <!-- <nav class="navbar navbar-light bg-light float-right">

                                <form class="form-inline float-right" method="get" name="search-expedient"
                                      action="{{route("movements.index")}}" role="search">
                                    <input name="expedientNro" id="expedientNro" class="form-control mr-sm-2"
                                           autocomplete="off" type="search" placeholder="Nro. expediente"
                                           aria-label="Search" >
                                    <input type="date" id="creation_date" name="created_at"
                                           class="form-control mr-sm-2">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </nav> -->


                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Expediente</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Destino</th>
                                    <th scope="col">Nro. de Pase</th>
                                    <th scope="col">Foja</th>
                                    <th scope="col">Usuario de origen</th>
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
            {{ $movements->links() }}
        </div>
        </div>
    </main>
@endsection
