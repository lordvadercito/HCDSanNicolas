@extends('.layouts.news')

@section('title', 'Noticias')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Noticias</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('NewsController@create') }}">Nueva noticia</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Extracto</th>
                                    <th scope="col">Última modificación</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news as $item)
                                    <tr>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->excerpt}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td><a role="button" class="btn btn-primary"
                                               href="{{ action('NewsController@edit', ['id' => $item->id]) }}">Editar</a>
                                        </td>
                                        <td><a role="button" class="btn btn-secondary"
                                               href="{{ action('NewsController@show', ['id' => $item->id]) }}">Ver
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
            <br>
            <hr>
            <br>
            <div class="row text-center justify-content-center">
                {{ $news->links() }}
            </div>
        </div>
    </main>
@endsection
