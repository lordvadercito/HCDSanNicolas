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
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedientNro" class="text-md-right">Nro.
                                                Expediente</label>

                                            <input type="number" name="expedientNro" id="expedientNro"
                                                   value="{{old('expedientNro')}}"
                                                   class="form-control {{ $errors->has('expedientNro') ? ' is-invalid' : '' }}"
                                                   required autofocus placeholder="000000"
                                                   onchange="loadIncommingRecord();">
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
                                                   value="{{old('expedientDENro')}}"
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="subject" class="text-md-right">Tema</label>
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
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="secondary_subject" class="text-md-right">Tema secundario</label>
                                            <input type="text" name="secondary_subject"
                                                   value="{{ old('secondary_subject') }}"
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
                                                   value="{{ \Carbon\Carbon::now()->toDateString() }}"
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
                                            <label for="commission_id" class="text-md-right">Comisión de destino</label>
                                            <select name="commission_id" id="commission_id"
                                                    class="form-control {{ $errors->has('commission_id') ? ' is-invalid' : '' }}"
                                                    required>
                                                @foreach(\App\Models\Commission::all() as $destination)
                                                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('commission_id'))
                                                    <strong>{{ $errors->first('commission_id') }}</strong>
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
                                            <label for="incomeRecord" class="text-md-right">Registro de
                                                entrada</label>
                                            <input type="text" readonly name="incomeRecord" id="incomeRecord"
                                                   class="form-control {{ $errors->has('incomeRecord') ? ' is-invalid' : '' }}"
                                                   value="{{ old('incomeRecord') }}">
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
                                                   value="{{ old('treatmentRecord') }}">
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
                                                      style="resize: none;">{{ old('cover') }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('cover'))
                                                    <strong>{{ $errors->first('cover') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                                    <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('user_id'))
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        @endif
                                        </span>
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

    <script>
        // Esta función asigna automáticamente el número de expediente al registro de ingreso
        function loadIncommingRecord()
        {
            var expedientNro = $('#expedientNro').val();
            var inputTag = $('#incomeRecord');

            inputTag.val(expedientNro);
        }
    </script>


@endsection
