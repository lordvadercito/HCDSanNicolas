@extends('.layouts.app')

@section('title', 'Modificación de bloques')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Editar bloque</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url("bloques/{$block->id}") }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{old('name', $block->name)}}"
                                               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('name'))
                                                <strong>{{ $errors->first('name') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description"
                                           class="col-md-4 col-form-label text-md-right">Descripcion</label>
                                    <div class="col-md-6">
                                        <input type="text" name="description"
                                               value="{{old('description', $block->description)}}"
                                               class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('description'))
                                                <strong>{{ $errors->first('description') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ URL::previous() }}" role="button"
                                        class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                                        <a href="{{action('BlockController@delete', ['id' => $block->id])}}" role="button" class="btn btn-danger float-right button-spacer">Eliminar</a>
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
