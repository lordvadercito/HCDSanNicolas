@extends('.layouts.app')

@section('title', 'Anexar a expedientes')

@section('content')

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Anexos cargados</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nro.</th>
                                    <th scope="col">Asunto</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($annexes as $annex)
                                    <tr>
                                        <th>{{$annex->expedientNro}}</th>
                                        <td>{{$annex->subject}}</td>
                                        <td>{{$annex->projectType}}</td>
                                        <td>{{$annex->id}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('ExpedientController@attachAnnex', ['annex' => $annex, 'expedient' => $expedient]) }}">Anexar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('ExpedientController@show', ['id' => $annex->id]) }}">Ver
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
