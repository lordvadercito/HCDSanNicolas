@extends('.layouts.app')

@section('title', 'Comisiones parlamentarias')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Comisiones parlamentarias cargadas</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($commissions as $commission)
                                    <tr>
                                        <td>{{$commission->name}}</td>
                                        <td>{{$commission->description}}</td>

                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('CommissionController@edit', ['id' => $commission->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('CommissionController@show', ['id' => $commission->id]) }}">Ver
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