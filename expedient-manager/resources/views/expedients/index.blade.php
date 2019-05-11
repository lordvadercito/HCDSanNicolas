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
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('ExpedientController@create') }}">Nuevo expediente</a>
                                <form class="form-inline" method="get" name="search-expedient"
                                      action="{{route("expedients.index")}}" role="search">
                                    <input name="expedientNro" id="expedientNro" class="form-control mr-sm-2"
                                           autocomplete="off" type="search" placeholder="Nro. expediente"
                                           aria-label="Search">
                                    <input type="date" id="creation_date" name="creation_date"
                                           class="form-control mr-sm-2">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </nav>
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($expedients as $expedient)
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
            <div class="row text-center justify-content-center">
                {{ $expedients->appends(Request::only(['expedientNro','creation_date']))->links() }}
            </div>
        </div>

    </main>




@endsection
