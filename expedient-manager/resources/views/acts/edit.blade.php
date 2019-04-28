@extends('.layouts.app')

@section('title', 'Edición de Actas')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Modificaión de actas</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url("/actas/{$act->id}") }}">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="act_nro" class="text-md-right">Acta Nro.</label>

                                            <input type="number" name="act_nro"
                                                   value="{{$act->act_nro, old('act_nro')}}"
                                                   class="form-control {{ $errors->has('act_nro') ? ' is-invalid' : '' }}"
                                                   required autofocus>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('act_nro'))
                                                    <strong>{{ $errors->first('act_nro') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="act_date" class="text-md-right">Fecha</label>
                                            <input type="date" name="act_date"
                                                   value="{{$act->act_date, old('act_date')}}"
                                                   class="form-control {{ $errors->has('act_date') ? ' is-invalid' : '' }}"
                                                   required autofocus>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('act_date'))
                                                    <strong>{{ $errors->first('act_date') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="session_type" class="text-md-right">Tipo de sesión</label>
                                            <select name="session_type" id="session_type"
                                                    class="form-control {{ $errors->has('session_type') ? ' is-invalid' : '' }}"
                                                    required>
                                                @if($act->session_type == "Ordinaria")
                                                    <option value="Ordinaria" selected>Ordinaria</option>
                                                    <option value="Extraordinaria">Extraordinaria</option>
                                                @else
                                                    <option value="Extraordinaria" selected>Extraordinaria</option>
                                                    <option value="Ordinaria">Ordinaria</option>
                                                @endif
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('session_type'))
                                                    <strong>{{ $errors->first('session_type') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="hcd_president" class="text-md-right">Presidente</label>
                                            <input type="text" name="hcd_president"
                                                   value="{{$act->hcd_president}}"
                                                   class="form-control {{ $errors->has('hcd_president') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('hcd_president'))
                                                    <strong>{{ $errors->first('hcd_president') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="hcd_secretary" class="text-md-right">Secretario</label>
                                            <input type="text" name="hcd_secretary"
                                                   value="{{$act->hcd_secretary}}"
                                                   class="form-control {{ $errors->has('hcd_secretary') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('hcd_secretary'))
                                                    <strong>{{ $errors->first('hcd_secretary') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="session_start" class="text-md-right">Inicio de sesión</label>
                                            <input type="datetime-local" name="session_start"
                                                   value="{{$act->session_start, old('session_start')}}"
                                                   class="form-control {{ $errors->has('session_start') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('session_start'))
                                                    <strong>{{ $errors->first('session_start') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="session_end" class="text-md-right">Fin de sesión</label>
                                            <input type="datetime-local" name="session_end"
                                                   value="{{$act->session_end, old('session_end')}}"
                                                   class="form-control {{ $errors->has('session_end') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('session_end'))
                                                    <strong>{{ $errors->first('session_end') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tribute" class="text-md-right">Homenaje</label>
                                            <input type="text" name="tribute"
                                                   value="{{$act->tribute, old('tribute')}}"
                                                   class="form-control {{ $errors->has('tribute') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('tribute'))
                                                    <strong>{{ $errors->first('tribute') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="observation" class="text-md-right">Observaciones</label>
                                            <textarea rows="6" name="observation" id="observation"
                                                      class="form-control {{ $errors->has('observation') ? ' is-invalid' : '' }}"
                                                      style="resize: none;">{{ $act->observation, old('observation') }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('observation'))
                                                    <strong>{{ $errors->first('observation') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{ URL('/actas/') }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                                        <a href="{{action('ActController@delete', ['id' => $act->id])}}"
                                           role="button" class="btn btn-danger float-right button-spacer">Eliminar</a>
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

