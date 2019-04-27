@extends('.layouts.app')

@section('title', 'Bloques de concejales')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Bloques de concejales</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('BlockController@create') }}">Nuevo bloque de concejales</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha de creación</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blocks as $block)
                                    <tr>
                                        <td>{{$block->name}}</td>
                                        <td>{{$block->description}}</td>
                                        <td>{{$block->created_at}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('BlockController@edit', ['id' => $block->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('BlockController@show', ['id' => $block->id]) }}">Ver
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
