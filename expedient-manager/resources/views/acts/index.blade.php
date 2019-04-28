@extends('.layouts.app')

@section('title', 'Actas')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Actas</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('ActController@create') }}">Nueva acta</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Acta Nro.</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Tipo de sesión</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($acts as $act)
                                    <tr>
                                        <td>{{$act->act_nro}} / {{substr($act->act_date, 0, 4)}}</td>
                                        <td>{{$act->act_date}}</td>
                                        <td>{{$act->session_type}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('ActController@edit', ['id' => $act->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary" target="_blank"
                                                    href="{{ action('ActController@show', ['id' => $act->id]) }}">Ver
                                                acta</a>
                                        </td>
                                        <td><a role="button" class="btn btn-success"
                                               href="{{ action('ActController@pdf', ['id' => $act->id]) }}" target="_blank">Descargar</a>
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

