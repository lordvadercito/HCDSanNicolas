@extends('.layouts.app')

@section('title', 'Anexos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Concejales</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('CouncillorController@create') }}">Nuevo concejal</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Bloque</th>
                                    <th scope="col">Comision</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($councillors as $councillor)
                                    <tr>
                                        <td>{{$councillor->name}}</td>
                                        <td>{{$councillor->surname}}</td>
                                        <td>{{$councillor->block->name}}</td>
                                        <td>{{$councillor->commission->name}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('CouncillorController@edit', ['id' => $councillor->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('CouncillorController@show', ['id' => $councillor->id]) }}">Ver
                                                detalle</a>
                                        </td>
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
