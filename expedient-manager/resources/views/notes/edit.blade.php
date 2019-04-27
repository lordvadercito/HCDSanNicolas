@extends('.layouts.app')

@section('title', 'Edición de Notas e informes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Edición de notas e informes</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url("notas/{$note->id}") }}">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nro" class="text-md-right">Nro.</label>

                                            <input type="number" name="nro" value="{{$note->nro, old('nro')}}"
                                                   class="form-control {{ $errors->has('nro') ? ' is-invalid' : '' }}"
                                                   required autofocus placeholder="000000">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('nro'))
                                                    <strong>{{ $errors->first('nro') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="type" class="text-md-right">Tipo</label>
                                            <select name="type" id="type"
                                                    class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}"
                                                    required>
                                                @if($note->type == 'N')
                                                    <option value="N">Nota</option>
                                                    <option value="I">Informe</option>
                                                @else
                                                    <option value="I">Informe</option>
                                                    <option value="N">Nota</option>
                                                @endif
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('type'))
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="direction" class="text-md-right">Dirección</label>
                                            <select name="direction" id="direction"
                                                    class="form-control {{ $errors->has('direction') ? ' is-invalid' : '' }}"
                                                    required>
                                                @if($note->direction == 'E')
                                                    <option value="E">Entrada</option>
                                                    <option value="S">Salida</option>
                                                @else
                                                    <option value="S">Salida</option>
                                                    <option value="E">Entrada</option>
                                                @endif
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('direction'))
                                                    <strong>{{ $errors->first('direction') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="creation_date" class="text-md-right">Fecha</label>

                                            <input type="date" name="creation_date"
                                                   value="{{$note->creation_date}}"
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
                                            <label for="origin" class="text-md-right">Origen</label>
                                            <input type="text" name="origin"
                                                   value="{{$note->origin, old('origin')}}"
                                                   class="form-control {{ $errors->has('origin') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('origin'))
                                                    <strong>{{ $errors->first('origin') }}</strong>
                                                @endif
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedient_id" class="text-md-right">Expediente</label>
                                            <select name="expedient_id" id="expedient_id"
                                                    class="form-control {{ $errors->has('expedient_id') ? ' is-invalid' : '' }}"
                                                    required>
                                                @foreach(\App\Models\Expedient::all() as $expedient)
                                                    <option value="{{$expedient->id}}">{{$expedient->expedientNro}}
                                                        - {{$expedient->subject}}</option>
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedient_id'))
                                                    <strong>{{ $errors->first('expedient_id') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="description" class="text-md-right">Descripción</label>
                                            <textarea rows="6" name="description" id="description"
                                                      class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                      style="resize: none;">{{ $note->description, old('description') }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('description'))
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
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
                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                                        <a href="{{action('NoteController@delete', ['id' => $note->id])}}"
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

