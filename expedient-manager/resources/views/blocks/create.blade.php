@extends('.layouts.app')

@section('title', 'Creacion de bloques de concejales')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Ingreso de nuevo bloque de concejales</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('bloques/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{old('name')}}"
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
                                        <input type="text" name="description" value="{{old('description')}}"
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
                                <button type="submit" class="btn btn-primary float-right">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection