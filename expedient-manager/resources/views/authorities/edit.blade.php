@extends('.layouts.app')

@section('title', 'Expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Autoridades</div>
                        <div class="card-body">
                            @foreach(\App\Models\Authority::all() as $authority)
                                <div class="form-row">
                                    <form method="POST" class="form-inline" action="{{ url("/autoridades/{$authority->id}") }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="col">
                                            <input type="text" name="position"
                                                   class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}"
                                                   value="{{$authority->position}}" readonly>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="name"
                                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   value="{{$authority->name}}">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="surname"
                                                   class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}"
                                                   value="{{$authority->surname}}">
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                        </div>


                                    </form>
                                </div>
                                <br>
                            @endforeach
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <a href="{{ route('expedients.index') }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
