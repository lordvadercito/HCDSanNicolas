@extends('.layouts.app')

@section('title', 'Modificación de expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Editar expediente</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url("/expedientes/{$expedient->id}") }}">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedientNro" class="text-md-right">Nro.
                                                Expediente</label>

                                            <input type="number" name="expedientNro"
                                                   value="{{old('expedientNro', $expedient->expedientNro)}}"
                                                   class="form-control {{ $errors->has('expedientNro') ? ' is-invalid' : '' }}"
                                                   required autofocus placeholder="000000">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedientNro'))
                                                    <strong>{{ $errors->first('expedientNro') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedientDENro" class="text-md-right">Nro.
                                                Expediente D.E.</label>
                                            <input type="text" name="expedientDENro"
                                                   value="{{old('expedientDENro', $expedient->expedientDENro)}}"
                                                   class="form-control {{ $errors->has('expedientDENro') ? ' is-invalid' : '' }}"
                                                   autofocus placeholder="000000/2000">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedientDENro'))
                                                    <strong>{{ $errors->first('expedientDENro') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="projectType" class="text-md-right">Tipo de
                                                proyecto</label>
                                            <input type="text" name="projectType"
                                                   value="{{ old('projectType', $expedient->projectType) }}"
                                                   class="form-control {{ $errors->has('projectType') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('projectType'))
                                                    <strong>{{ $errors->first('projectType') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="subject" class="text-md-right">Tema</label>
                                            <input type="text" name="subject"
                                                   value="{{ old('subject', $expedient->subject) }}"
                                                   class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('subject'))
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="secondary_subject" class="text-md-right">Tema secundario</label>
                                            <input type="text" name="secondary_subject"
                                                   value="{{ old('secondary_subject', $expedient->secondary_subject) }}"
                                                   class="form-control {{ $errors->has('secondary_subject') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('secondary_subject'))
                                                    <strong>{{ $errors->first('secondary_subject') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="creation_date"
                                                   class="text-md-right">Fecha de ingreso</label>
                                            <input type="date" name="creation_date"
                                                   value="{{ old('creation_date', $expedient->creation_date) }}"
                                                   class="form-control {{ $errors->has('creation_date') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('creation_date'))
                                                    <strong>{{ $errors->first('creation_date') }}</strong>
                                                @endif
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="state" class="text-md-right">Estado</label>
                                            <select name="state" id="state"
                                                    class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                    required>
                                                <option
                                                    value="{{old('state', $expedient->state)}}">{{old('state', $expedient->state)}}</option>

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
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="origin" class="text-md-right">Origen</label>
                                            <select name="origin" id="origin"
                                                    class="form-control {{ $errors->has('origin') ? ' is-invalid' : '' }}"
                                                    required>
                                                <option
                                                    value="{{old('origin', $expedient->origin)}}">{{old('state', $expedient->origin)}}</option>
                                                @foreach(\App\Models\Origin::$origins as $origin)
                                                    <option value="{{$origin}}">{{$origin}}</option>
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('origin'))
                                                    <strong>{{ $errors->first('origin') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="archived"
                                                   class="text-md-right">Archivado</label>
                                            <select name="archived" id="archived"
                                                    class="form-control {{ $errors->has('archived') ? ' is-invalid' : '' }}"
                                                    required>
                                                @if($expedient->archived == 0)
                                                    <option value=0>No</option>
                                                    <option value=1>Si</option>
                                                @else
                                                    <option value=1>Si</option>
                                                    <option value=0>No</option>
                                                @endif
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                                @if ($errors->has('archived'))
                                                    <strong>{{ $errors->first('archived') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="incomeRecord" class="text-md-right">Registro de
                                                entrada</label>
                                            <input type="text" name="incomeRecord"
                                                   class="form-control {{ $errors->has('incomeRecord') ? ' is-invalid' : '' }}"
                                                   value="{{ old('incomeRecord', $expedient->incomeRecord) }}">
                                            <span role="alert" class="invalid-feedback">
                                                                            @if ($errors->has('incomeRecord'))
                                                    <strong>{{ $errors->first('incomeRecord') }}</strong>
                                                @endif
                                                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="treatmentRecord" class="text-md-right">Registro
                                                de tratamiento</label>
                                            <input type="text" name="treatmentRecord"
                                                   class="form-control {{ $errors->has('treatmentRecord') ? ' is-invalid' : '' }}"
                                                   value="{{ old('treatmentRecord', $expedient->treatmentRecord) }}">
                                            <span role="alert" class="invalid-feedback">
                                                                            @if ($errors->has('treatmentRecord'))
                                                    <strong>{{ $errors->first('treatmentRecord') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cover" class="text-md-right">Carátula</label>
                                            <textarea rows="6" name="cover" id="cover"
                                                      class="form-control {{ $errors->has('cover') ? ' is-invalid' : '' }}"
                                                      style="resize: none;">{{ old('cover', $expedient->cover) }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                                @if ($errors->has('cover'))
                                                    <strong>{{ $errors->first('cover') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="user_id" value={{ $expedient->user_id }}>
                                    <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('user_id'))
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        @endif
                                        </span>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a href="{{ URL::previous() }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="javascript:window.open('anexar','{{$expedient}}','toolbar=no');void 0"
                                           role="button" class="btn btn-success">Agregar anexo</a>
                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
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
