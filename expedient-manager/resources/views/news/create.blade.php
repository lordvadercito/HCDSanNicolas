@extends('.layouts.news')

@section('title', 'Nueva noticia')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Nueva noticia</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/noticias/creada') }}" accept-charset="UTF-8"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="title" class="text-md-right">Título</label>
                                            <input name="title" id="title" type="text"
                                                   class="form-control"
                                                   required autocomplete="off">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('title'))
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="excerpt" class="text-md-right">Extracto</label>
                                            <textarea rows="3" style="resize: none;" name="excerpt" id="excerpt"
                                                      class="form-control {{ $errors->has('excerpt') ? ' is-invalid' : '' }}"
                                                      required autocomplete="off"></textarea>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('excerpt'))
                                                    <strong>{{ $errors->first('excerpt') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="body" class="text-md-right">Cuerpo</label>
                                            <textarea rows="10" style="resize: none;" name="body" id="body"
                                                      class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}"
                                                      required autocomplete="off"></textarea>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('body'))
                                                    <strong>{{ $errors->first('body') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="category" class="text-md-right">Categoría</label>
                                            <input name="category" id="category" type="text"
                                                   class="form-control {{ $errors->has('category') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('category'))
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="user_id" class="text-md-right">Creado por</label>
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            <input name="facade_user" id="facade_user" type="text"
                                                   class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                                   value="{{auth()->user()->name}}" readonly>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('category'))
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="image_file">Subir imagen&nbsp;</label>
                                            <input name="image_file" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a href="{{ URL::previous() }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" class="btn btn-primary float-right">Guardar</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
