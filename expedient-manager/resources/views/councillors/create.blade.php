@extends('.layouts.app')

@section('title', 'Creacion de concejales')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Ingreso de nuevo concejal</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('concejales/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="expedientNro"
                                           class="col-md-4 col-form-label text-md-right">Nombre</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{old('name')}}"
                                               class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('name'))
                                                <strong>{{ $errors->first('name') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="surname" class="col-md-4 col-form-label text-md-right">Apellido</label>
                                    <div class="col-md-6">
                                        <input type="text" name="surname" value="{{old('surname')}}"
                                               class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('surname'))
                                                <strong>{{ $errors->first('surname') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="blocks_id" class="col-md-4 col-form-label text-md-right">Bloque</label>
                                    <div class="col-md-6">
                                        <select name="blocks_id" id="blocks_id"
                                                class="form-control {{ $errors->has('blocks_id') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\Block::all() as $block)
                                                <option value="{{$block->id}}">{{$block->name}}</option>
                                            @endforeach
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('blocks_id'))
                                                <strong>{{ $errors->first('blocks_id') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="commissions_id"
                                           class="col-md-4 col-form-label text-md-right">Comision</label>
                                    <div class="col-md-6">
                                        <select name="commissions_id" id="commissions_id"
                                                class="form-control {{ $errors->has('commissions_id') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\Commission::all() as $commission)
                                                <option value="{{$commission->id}}">{{$commission->name}}</option>
                                            @endforeach
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('$commission'))
                                                <strong>{{ $errors->first('$commission') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="start_of_mandate"
                                           class="col-md-4 col-form-label text-md-right">Inicio de mandato</label>
                                    <div class="col-md-6">
                                        <input type="date" name="start_of_mandate" value="{{old('start_of_mandate')}}"
                                               class="form-control {{ $errors->has('start_of_mandate') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('start_of_mandate'))
                                                <strong>{{ $errors->first('start_of_mandate') }}</strong>
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_of_mandate"
                                           class="col-md-4 col-form-label text-md-right">Finalizazcion de
                                        mandato</label>
                                    <div class="col-md-6">
                                        <input type="date" name="end_of_mandate" value="{{old('end_of_mandate')}}"
                                               class="form-control {{ $errors->has('end_of_mandate') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('end_of_mandate'))
                                                <strong>{{ $errors->first('end_of_mandate') }}</strong>
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="active"
                                           class="col-md-4 col-form-label text-md-right">Activo</label>
                                    <div class="col-md-6">
                                        <select name="active" id="active"
                                                class="form-control {{ $errors->has('active') ? ' is-invalid' : '' }}"
                                                required>
                                            <option value=0>No</option>
                                            <option value=1>Si</option>
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('active'))
                                                <strong>{{ $errors->first('active') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary float-right">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection