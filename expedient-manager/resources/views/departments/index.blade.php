@extends('.layouts.app')

@section('title', 'Departamentos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Departamentos</div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Externo</th>
                                    <th scope="col">Tipo</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <td>{{$department->name}}</td>
                                        <td>@if($department->external == 1)
                                                Si
                                            @else
                                                No
                                            @endif</td>
                                        <td>{{$department->departmentType}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('DepartmentController@edit', ['id' => $department->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('DepartmentController@show', ['id' => $department->id]) }}">Ver
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