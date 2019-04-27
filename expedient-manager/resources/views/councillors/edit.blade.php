@extends('.layouts.app')

@section('title', 'Modificación de concejales')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Editar concejal</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url("concejales/{$councillor->id}") }}">
                                @method('PUT')
                                @csrf

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name" class="text-md-right">Nombre</label>

                                            <input type="text" name="name" id="name"
                                                   value="{{old('name', $councillor->name)}}"
                                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   required autofocus autocomplete="off">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('name'))
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="surname" class="text-md-right">Apellido</label>
                                            <input type="text" name="surname" id="surname"
                                                   value="{{old('surname', $councillor->surname)}}"
                                                   class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                                   required autocomplete="off">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('surname'))
                                                    <strong>{{ $errors->first('surname') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="blocks_id" class="text-md-right">Bloque</label>

                                            <select name="blocks_id" id="blocks_id"
                                                    class="form-control {{ $errors->has('blocks_id') ? ' is-invalid' : '' }}"
                                                    required>
                                                @foreach(\App\Models\Block::all() as $block)
                                                    @if($block->id == $councillor->blocks_id)
                                                        <option value="{{$block->id}}"
                                                                selected>{{$block->name}}</option>
                                                    @else
                                                        <option value="{{$block->id}}">{{$block->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('blocks_id'))
                                                    <strong>{{ $errors->first('blocks_id') }}</strong>
                                                @endif
                                        </span>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="commissions_id" class="text-md-right">Comisión</label>
                                            <select name="commissions_id" id="commissions_id"
                                                    class="form-control {{ $errors->has('commissions_id') ? ' is-invalid' : '' }}"
                                                    required>
                                                @foreach(\App\Models\Commission::all() as $commission)
                                                    @if($commission->id == $councillor->commissions_id)
                                                        <option value="{{$commission->id}}"
                                                                selected>{{$commission->name}}</option>
                                                    @else
                                                        <option
                                                            value="{{$commission->id}}">{{$commission->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('$commission'))
                                                    <strong>{{ $errors->first('$commission') }}</strong>
                                                @endif
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="start_of_mandate" class="text-md-right">Inicio de mandato</label>
                                        <input type="date" name="start_of_mandate"
                                               value="{{old('start_of_mandate', $councillor->start_of_mandate)}}"
                                               class="form-control {{ $errors->has('start_of_mandate') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('start_of_mandate'))
                                                <strong>{{ $errors->first('start_of_mandate') }}</strong>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col">
                                        <label for="end_of_mandate" class="text-md-right">Finalización de
                                            mandato</label>
                                        <input type="date" name="end_of_mandate"
                                               value="{{old('end_of_mandate', $councillor->end_of_mandate)}}"
                                               class="form-control {{ $errors->has('end_of_mandate') ? ' is-invalid' : '' }}"
                                               required autofocus>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('end_of_mandate'))
                                                <strong>{{ $errors->first('end_of_mandate') }}</strong>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="active"
                                                   cclass="text-md-right">Activo</label>
                                            <select name="active" id="active"
                                                    class="form-control {{ $errors->has('active') ? ' is-invalid' : '' }}"
                                                    required>
                                                @if($councillor->active == 0)
                                                    <option value=0 selected>No</option>
                                                    <option value=1>Si</option>
                                                @else
                                                    <option value=1 selected>Si</option>
                                                    <option value=0>No</option>
                                                @endif
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('active'))
                                                    <strong>{{ $errors->first('active') }}</strong>
                                                @endif
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <a href="{{ URL::previous() }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                                        <a href="{{action('CouncillorController@delete', ['id' => $councillor->id])}}"
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
