@extends('.layouts.app')

@section('title', 'Búsqueda de expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Buscar expediente</div>
                        <div class="card-body">
                            <form method="GET" action="{{ url("/expedientes/resultado/{expedientNro}") }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" name="expedientNro" class="form-control" placeholder="Ingrese número de expediente" aria-label="Ingrese número de expediente" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
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
