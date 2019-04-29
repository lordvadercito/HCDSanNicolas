@extends('.layouts.app')

@section('title', 'Órdenes del día')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Órdenes del día</div>
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light">
                                <a role="button" class="btn btn-primary"
                                   href="{{ action('DayOrderController@create') }}">Nuevo orden del día</a>
                            </nav>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Nro. de Orden</th>
                                    <th scope="col">Nro. de Acta</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Nro. de sesión</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($day_orders as $day_order)
                                    <tr>
                                        <td>{{$day_order->id}}</td>
                                        <td>{{$day_order->acts->act_nro}}
                                            / {{substr($day_order->acts->act_date, 0, 4)}}</td>
                                        <td>{{$day_order->dateOrder}}</td>
                                        <td>{{$day_order->sessionNro}}</td>
{{--                                        <td><a role="button" class="btn btn-primary"--}}
{{--                                               href="{{ action('DayOrderController@edit', ['id' => $day_order->id]) }}">Editar</a>--}}
{{--                                        </td>--}}
                                        <td><a role="button" class="btn btn-secondary" target="_blank"
                                               href="{{ action('DayOrderController@viewPdf', ['id' => $day_order->id]) }}">Ver
                                                orden</a></td>
                                        <td><a role="button" class="btn btn-success"
                                               href="{{ action('DayOrderController@downloadPdf', ['id' => $day_order->id]) }}"
                                               target="_blank">Impresión final</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
            <div class="row text-center justify-content-center">
                {{ $day_orders->links() }}
            </div>
        </div>
    </main>
@endsection
