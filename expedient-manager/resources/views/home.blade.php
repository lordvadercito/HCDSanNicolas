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
                        <br>
                        <hr>
                        <br>
                        <div class="col alert alert-light text-center" role="alert">
                            Bienvenido, <strong>{{ Auth::user()->name }}!</strong>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a role="button" class="btn btn-outline-primary col" href="{{route('notes.create')}}"><i
                                        class="fa fa-clipboard"></i> Nueva nota o informe</a>
                            </div>
                            <div class="col">
                                <a role="button" class="btn btn-outline-success col"
                                   href="{{route('expedients.search')}}"> <i class="fa fa-search"
                                                                             aria-hidden="true"></i> Buscar
                                    expediente</a>
                            </div>
                            <div class="col">
                                <a role="button" class="btn btn-outline-info col" href="{{route('dayOrders.create')}}">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Nuevo órden del día</a>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="alert text-center">
                            <i class="fa fa-check-circle" aria-hidden="true" style="color: #1e7e34"></i>&nbsp;En línea
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
