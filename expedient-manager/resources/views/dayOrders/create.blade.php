@extends('.layouts.app')

@section('title', 'Creacion de órdenes del día')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Creación de órdenes del día</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('/orden/creado') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="act_nro" class="text-md-right">Acta Nro.</label>
                                            <select name="act_id" id="act_id"
                                                    class="form-control {{ $errors->has('act_id') ? ' is-invalid' : '' }}"
                                                    required>
                                                @foreach(\App\Models\Act::all() as $act)
                                                    <option value="{{$act->id}}">{{$act->act_nro}}
                                                        / {{substr($act->act_date, 0, 4)}}</option>
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('act_id'))
                                                    <strong>{{ $errors->first('act_id') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="dateOrder" class="text-md-right">Fecha</label>
                                            <input type="date" name="dateOrder" value="{{old('dateOrder')}}"
                                                   class="form-control {{ $errors->has('dateOrder') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('dateOrder'))
                                                    <strong>{{ $errors->first('dateOrder') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sessionNro" class="text-md-right">Nro. de sesión</label>
                                            <input type="number" name="sessionNro" value="{{old('sessionNro')}}"
                                                   class="form-control {{ $errors->has('sessionNro') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('sessionNro'))
                                                    <strong>{{ $errors->first('sessionNro') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{ URL('/orden/') }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary float-right" onclick="console.log('BOTON PRESIONADO');">Guardar y anexar</button>
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
