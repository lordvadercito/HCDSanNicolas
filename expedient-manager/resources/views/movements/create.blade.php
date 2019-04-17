@extends('.layouts.app')

@section('title', 'Mover expediente')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Mover expediente | Generar pase</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/movimientos/creado') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedient_id" class="text-md-right">Expediente</label>
                                            <input type="hidden" readonly name="expedient_id" id="expedient_id"
                                                   class="form-control {{ $errors->has('expedient_id') ? ' is-invalid' : '' }}"
                                                   required value="{{$expedient->id}}">
                                            <input type="text" readonly
                                                   class="form-control"
                                                   required
                                                   value="{{$expedient->expedientNro}} / {{substr($expedient->creation_date, 0, 4)}} - {{$expedient->subject}}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedient_id'))
                                                    <strong>{{ $errors->first('expedient_id') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="origin" class="text-md-right">Ubicación actual</label>
                                            <input type="text" readonly name="origin" id="origin"
                                                   class="form-control {{ $errors->has('origin') ? ' is-invalid' : '' }}"
                                                   required value="{{$actual->first()->destination}}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('origin'))
                                                    <strong>{{ $errors->first('origin') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="destination" class="text-md-right">Destino</label>
                                            <input list="destinations" type="text" name="destination" id="destination"
                                                   class="form-control {{ $errors->has('destination') ? ' is-invalid' : '' }}"
                                                   required>
                                            <datalist id="destinations">
                                                @foreach(\App\Models\Destination::$destinations as $destiny)
                                                    <option value="{{$destiny}}"></option>
                                                @endforeach
                                                @foreach(\App\Models\Commission::all() as $commission)
                                                    <option value="{{$commission->name}}"></option>
                                                @endforeach
                                            </datalist>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('destination'))
                                                    <strong>{{ $errors->first('destination') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="movement_nro" class="text-md-right">Nro. de Pase</label>
                                            <input type="number" readonly name="movement_nro" id="movement_nro"
                                                   class="form-control {{ $errors->has('movement_nro') ? ' is-invalid' : '' }}"
                                                   required value="{{$actual->first()->movement_nro + 1}}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('movement_nro'))
                                                    <strong>{{ $errors->first('movement_nro') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="foja" class="text-md-right">Foja</label>
                                            <input type="number" name="foja" id="foja"
                                                   class="form-control {{ $errors->has('foja') ? ' is-invalid' : '' }}"
                                                   required value="{{$actual->first()->foja}}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('foja'))
                                                    <strong>{{ $errors->first('foja') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="origin_user" class="text-md-right">Usuario</label>
                                            <input type="hidden" name="origin_user" id="origin_user"
                                                   class="form-control {{ $errors->has('origin_user') ? ' is-invalid' : '' }}"
                                                   required value="{{ auth()->user()->id }}">
                                            <input type="text" readonly
                                                   class="form-control {{ $errors->has('origin_user') ? ' is-invalid' : '' }}"
                                                   required value="{{auth()->user()->name}}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('origin_user'))
                                                    <strong>{{ $errors->first('origin_user') }}</strong>
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
