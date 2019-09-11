@extends('.layouts.app')

@section('title', 'Notas e Informes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Notas e informes cargados</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('NoteController@create', ['type'=>'X']) }}">Nueva nota o informe</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nro.</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Origen</th>
                                    <th scope="col">Creación</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($notes as $note)
                                    <tr>
                                        <td>{{$note->nro}} / {{substr($note->creation_date, 0, 4)}}</td>
                                        <td>{{$note->type == 'N'? 'Nota' : 'Informe' }}</td>
                                        <td>{{$note->direction == 'E' ? 'Entrada' : 'Salida'}}</td>
                                        <td>{{$note->origin}}</td>
                                        <td>{{$note->creation_date }}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('NoteController@edit', ['id' => $note->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('NoteController@show', ['id' => $note->id]) }}">Ver
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
