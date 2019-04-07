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
                            <form method="POST" action="{{ url('/movimientos/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="expedient_id"
                                           class="col-md-4 col-form-label text-md-right">Expediente</label>
                                    <div class="col-md-6">
                                        <input type="hidden" name="expedient_id" class="form-control"
                                               value="{{$request->id}}">
                                        <input type="number" disabled name="expedient" class="form-control"
                                               value="{{$request->expedientNro}}">
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
                                        <br>
                                        <input name="origin_detail" type="text" class="form-control" placeholder="Detalle de origen">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="expedient" class="col-md-4 col-form-label text-md-right">Destino</label>
                                    <div class="col-md-6">
                                        <select name="destination" id="destination"
                                                class="form-control {{ $errors->has('destination') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\Destination::$destinations as $destination)
                                                <option value="{{$destination}}">{{$destination}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <input name="destination_detail" type="text" class="form-control" placeholder="Detalle de destino">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subject" class="col-md-4 col-form-label text-md-right">Tipo de
                                        movimiento</label>
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
                                    <label for="origin_user" class="col-md-4 col-form-label text-md-right">Usuario de
                                        origen</label>
                                    <div class="col-md-6">
                                        <input type="hidden" name="origin_user" value={{ auth()->user()->id }}>
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
