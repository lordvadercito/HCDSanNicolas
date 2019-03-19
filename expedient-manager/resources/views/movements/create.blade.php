@extends('.layouts.app')

@section('title', 'Mover expediente')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Mover expediente</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('movimientos/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="expedient" class="col-md-4 col-form-label text-md-right">Expediente</label>
                                    <div class="col-md-6">
                                        <select name="expedient" id="expedient"
                                                class="form-control {{ $errors->has('expedient') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\Expedient::all() as $expedient)
                                                <option value="{{$expedient->id}}">{{$expedient->expedientNro .' - ' .$expedient->subject}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expedient" class="col-md-4 col-form-label text-md-right">Origen</label>
                                    <div class="col-md-6">
                                        <select name="origin" id="origin"
                                                class="form-control {{ $errors->has('origin') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\Origin::$origins as $origin)
                                                <option value="{{$origin}}">{{$origin}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expedient" class="col-md-4 col-form-label text-md-right">Destino</label>
                                    <div class="col-md-6">
                                        <span style="color: #FF0000;">Falta definir los destinos</span>
                                        <select name="destination" id="destination"
                                                class="form-control {{ $errors->has('destination') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\Destination::$destinations as $destination)
                                                <option value="{{$destination}}">{{$destination}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Tipo de movimiento</label>
                                    <div class="col-md-6">
                                        <input type="text" name="movementType" value="{{ old('movementType') }}"
                                               class="form-control {{ $errors->has('movementType') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('movementType'))
                                                <strong>{{ $errors->first('movementType') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Usuario de origen</label>
                                    <div class="col-md-6">
                                        <input type="hidden" name="origin_user" value="{{ auth()->user()->id }}">
                                        <input disabled type="text" readonly value="{{auth()->user()->name}}"
                                               class="form-control {{ $errors->has('origin_user') ? ' is-invalid' : '' }}"
                                               required>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('origin_user'))
                                                <strong>{{ $errors->first('origin_user') }}</strong>
                                            @endif
                                        </span>

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