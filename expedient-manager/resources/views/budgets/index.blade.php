@extends('.layouts.budgets')

@section('title', 'Presupuestos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Presupuestos</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('BudgetController@create') }}">Subir archivo</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Archivo</th>
                                    <th scope="col">Subido por</th>
                                    <th scope="col">Subido el</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($budgets as $budget)
                                    <tr>
                                        <td>{{$budget->file_name}}</td>
                                        <td>{{$budget->users->name}}</td>
                                        <td>{{$budget->created_at}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ asset('/storage/'.$budget->file_name) }}" target="_blank">Ver
                                                PDF</a></td>
                                        <td><a role="button" class="btn btn-danger"
                                               href="{{ action('BudgetController@delete', ['id' => $budget->id]) }}">
                                                Eliminar</a>
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
                {{ $budgets->links() }}
            </div>
        </div>
    </main>
@endsection
