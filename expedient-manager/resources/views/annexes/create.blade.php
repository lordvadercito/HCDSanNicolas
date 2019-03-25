@extends('.layouts.app')

@section('title', 'Creacion de anexos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Ingreso de nuevo anexo</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('anexos/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="nroAnnex" class="col-md-4 col-form-label text-md-right">Nro.</label>
                                    <div class="col-md-6">
                                        <input type="number" name="nroAnnex" value="{{old('nroAnnex')}}"
                                               class="form-control {{ $errors->has('nroAnnex') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('nroAnnex'))
                                                <strong>{{ $errors->first('nroAnnex') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>
                                    <div class="col-md-6">
                                        <input type="text" name="title" value="{{ old('title') }}"
                                               class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('title'))
                                                <strong>{{ $errors->first('title') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Tipo</label>
                                    <div class="col-md-6">
                                        <input type="text" name="type" value="{{ old('type') }}"
                                               class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('type'))
                                                <strong>{{ $errors->first('type') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Contenido</label>
                                    <div class="col-md-6">
                                        <textarea rows="6" name="content" id="content"
                                                  class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}"
                                                  style="resize: none;">{{ old('content') }}</textarea>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('content'))
                                                <strong>{{ $errors->first('content') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{ URL::previous() }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col-sm-6">
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