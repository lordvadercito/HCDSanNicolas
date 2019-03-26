@extends('.layouts.app')

@section('title', 'Anexos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Anexos cargados</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('AnnexController@create') }}">Nuevo anexo</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nro.</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($annexes as $annex)
                                    <tr>
                                        <th>{{$annex->nroAnnex}}</th>
                                        <td>{{$annex->title}}</td>
                                        <td>{{$annex->type}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('AnnexController@edit', ['id' => $annex->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('AnnexController@show', ['id' => $annex->id]) }}">Ver
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