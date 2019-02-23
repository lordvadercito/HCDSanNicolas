@extends('.layouts.app')

@section('title', 'Expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Expedientes cargados</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nro Expediente</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Asunto</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expedients as $expedient)
                                    <tr>
                                        <th>{{$expedient->expedientNro}}</th>
                                        <td>{{$expedient->projectType}}</td>
                                        <td>{{$expedient->subject}}</td>
                                        <td>{{$expedient->state}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('ExpedientController@edit', ['id' => $expedient->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('ExpedientController@show', ['id' => $expedient->id]) }}">Ver detalle</a>
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