@extends('.layouts.budgets')

@section('title', 'Nueva archivo de presupuesto')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Subir archivo de presupuesto</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/presupuestos/creado') }}" accept-charset="UTF-8"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="text-center" for="pdf_file">Seleccione el archivo</label>
                                            <input type="file" accept=".pdf" name="pdf_file"
                                                   class="form-control {{ $errors->has('pdf_file') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('pdf_file'))
                                                    <strong>{{ $errors->first('pdf_file') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="user_id" class="text-md-right">Subido por</label>
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                            <input name="facade_user" id="facade_user" type="text"
                                                   class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                                   value="{{auth()->user()->name}}" readonly>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('user_id'))
                                                    <strong>{{ $errors->first('user_id') }}</strong>
                                                @endif
                                            </span>
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
