@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Panel de control</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-light text-center" role="alert">
                            Tipo de usuario: <strong>{{ Auth::user()->role }}</strong>
                        </div>

                        <div class="alert alert-success text-center">
                            Sesión iniciada
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
