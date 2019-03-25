@extends('.layouts.app')

@section('title', 'Creacion de expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Ingreso de nuevo expediente</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('expedientes/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="expedientNro" class="col-md-4 col-form-label text-md-right">Nro.
                                        Expediente</label>
                                    <div class="col-md-6">
                                        <input type="number" name="expedientNro" value="{{old('expedientNro')}}"
                                               class="form-control {{ $errors->has('expedientNro') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedientNro'))
                                                <strong>{{ $errors->first('expedientNro') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="projectType" class="col-md-4 col-form-label text-md-right">Tipo de
                                        proyecto</label>
                                    <div class="col-md-6">
                                        <input type="text" name="projectType" value="{{ old('projectType') }}"
                                               class="form-control {{ $errors->has('projectType') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('projectType'))
                                                <strong>{{ $errors->first('projectType') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Asunto</label>
                                    <div class="col-md-6">
                                        <input type="text" name="subject" value="{{ old('subject') }}"
                                               class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('subject'))
                                                <strong>{{ $errors->first('subject') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="creation_date"
                                           class="col-md-4 col-form-label text-md-right">Creación</label>
                                    <div class="col-md-6">
                                        <input type="date" name="creation_date" value="{{ old('creation_date') }}"
                                               class="form-control {{ $errors->has('creation_date') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('creation_date'))
                                                <strong>{{ $errors->first('creation_date') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cover" class="col-md-4 col-form-label text-md-right">Carátula</label>
                                    <div class="col-md-6">
                                        <textarea rows="6" name="cover" id="cover"
                                                  class="form-control {{ $errors->has('cover') ? ' is-invalid' : '' }}"
                                                  style="resize: none;">{{ old('cover') }}</textarea>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('cover'))
                                                <strong>{{ $errors->first('cover') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="state" class="col-md-4 col-form-label text-md-right">Estado</label>
                                    <div class="col-md-6">
                                        <select name="state" id="state"
                                                class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\State::$states as $state)
                                                <option value="{{$state}}">{{$state}}</option>
                                            @endforeach
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('state'))
                                                <strong>{{ $errors->first('state') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="archived"
                                           class="col-md-4 col-form-label text-md-right">Archivado</label>
                                    <div class="col-md-6">
                                        <select name="archived" id="archived"
                                                class="form-control {{ $errors->has('archived') ? ' is-invalid' : '' }}"
                                                required>
                                            <option value=0>No</option>
                                            <option value=1>Si</option>
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('archived'))
                                                <strong>{{ $errors->first('archived') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="incomeRecord" class="col-md-4 col-form-label text-md-right">Registro de
                                        entrada</label>
                                    <div class="col-md-6">
                                        <input type="text" name="incomeRecord"
                                               class="form-control {{ $errors->has('incomeRecord') ? ' is-invalid' : '' }}"
                                               value="{{ old('incomeRecord') }}">
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('incomeRecord'))
                                                <strong>{{ $errors->first('incomeRecord') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="treatmentRecord" class="col-md-4 col-form-label text-md-right">Registro
                                        de tratamiento</label>
                                    <div class="col-md-6">
                                        <input type="text" name="treatmentRecord"
                                               class="form-control {{ $errors->has('treatmentRecord') ? ' is-invalid' : '' }}"
                                               value="{{ old('treatmentRecord') }}">
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('treatmentRecord'))
                                                <strong>{{ $errors->first('treatmentRecord') }}</strong>
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