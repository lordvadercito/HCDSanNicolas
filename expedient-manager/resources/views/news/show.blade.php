@extends('.layouts.news')

@section('title', 'Detalle de noticia')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Noticia</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <h1 class="text-center">{{$news->title}}</h1>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <p class="text-justify">{{$news->excerpt}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="col">
                                    <p class="text-justify">{{$news->body}}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    @if(!is_null($news->image_name))
                                        <img class="img-thumbnail" src="/storage/{{$news->image_name}}"
                                             alt="Imagen de noticia">
                                    @endif
                                </div>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <a href="{{ route('news.index') }}" role="button"
                                       class="btn btn-link float-left">Volver</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="{{ action('NewsController@edit', ['id' => $news->id]) }}" type="button" class="btn btn-primary float-right">Editar</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
