@extends('.layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Expedientes encontrados</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nro.</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Asunto</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expedient as $expedient)
                                    <tr>
                                        <td>{{$expedient->expedientNro}}
                                            / {{substr($expedient->creation_date, 0, 4)}}</td>
                                        <td>{{$expedient->projectType}}</td>
                                        <td>{{$expedient->subject}}</td>
                                        <td>{{$expedient->state}}</td>
                                        {{--                                        <td>{{$expedient->creation_date }}</td>--}}
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('ExpedientController@edit', ['id' => $expedient->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('ExpedientController@show', ['id' => $expedient->id]) }}">Ver</a>
                                        </td>
                                        <td><a role="button" class="btn btn-success"
                                               href="{{action('MovementController@fastPass',['id' => $expedient->id])}}">Pase</a>
                                        </td>
                                        <td><a role="button" class="btn btn-warning"
                                               href="{{action('MovementController@show',['id' => $expedient->id])}}">Ruta</a>
                                        </td>
                                        <td><a role="button" class="btn btn-outline-info" target="_blank"
                                               href="{{ action('ExpedientController@viewPdf', ['id' => $expedient->id]) }}">Exportar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
        </div>

    </main>




@endsection

