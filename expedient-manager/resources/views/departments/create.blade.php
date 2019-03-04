@extends('.layouts.app')

@section('title', 'Creacion de departamentos')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Ingreso de nuevo departamentoe</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('departamentos/creado') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre del
                                        departamento</label>
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
                                    <label for="external"
                                           class="col-md-4 col-form-label text-md-right">Externo</label>
                                    <div class="col-md-6">
                                        <select name="external" id="external"
                                                class="form-control {{ $errors->has('external') ? ' is-invalid' : '' }}"
                                                required>
                                            <option value=0>No</option>
                                            <option value=1>Si</option>
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('external'))
                                                <strong>{{ $errors->first('external') }}</strong>
                                            @endif
                                        </span>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="departmentType" class="col-md-4 col-form-label text-md-right">Tipo de
                                        departamento</label>
                                    <div class="col-md-6">
                                        <select name="departmentType" id="departmentType"
                                                class="form-control {{ $errors->has('departmentType') ? ' is-invalid' : '' }}"
                                                required>
                                            @foreach(\App\Models\DepartmentType::$departmentTypes as $departmentType)
                                                <option value="{{$departmentType}}">{{$departmentType}}</option>
                                            @endforeach
                                        </select>
                                        <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('departmentType'))
                                                <strong>{{ $errors->first('departmentType') }}</strong>
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