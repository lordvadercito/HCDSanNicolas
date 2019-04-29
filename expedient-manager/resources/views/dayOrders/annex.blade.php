@extends('.layouts.app')

@section('title', 'Anexo de expedientes y notas')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Anexo de documentación a órdenes del día</div>
                        <div class="card-body">
                            <div class="alert alert-info text-center" role="alert">
                                <strong>Acta Nro.: </strong>{{$dayOrder->acts->act_nro}}
                                / {{substr($dayOrder->acts->act_date, 0, 4)}}
                            </div>
                            <form method="POST" action="{{ url('/orden/anexado') }}">
                                @csrf
                                <input type="hidden" name="dayOrderId" value="{{$dayOrder->id}}">
                                <div class="form-row">
                                    <h5>Expedientes</h5>
                                    <br>
                                    <hr>
                                    @foreach($expedients as $expedient)
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="expedients[]"
                                                           aria-label="Checkbox for following text input"
                                                           value="{{$expedient->id}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                   aria-label="Text input with checkbox"
                                                   value="{{$expedient->expedientNro}} / {{substr($expedient->creation_date, 0, 4)}} - {{$expedient->subject}}">
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <hr>
                                <div class="form-row">
                                    <h5>Informes ingresados</h5>
                                    <br>
                                    <hr>
                                    @foreach($informs_in as $infin)
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="informsIn[]"
                                                           aria-label="Checkbox for following text input"
                                                           value="{{$infin->id}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                   aria-label="Text input with checkbox"
                                                   value="{{$infin->nro}} / {{substr($infin->creation_date, 0, 4)}} - {{$infin->origin}}">
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <hr>
                                <div class="form-row">
                                    <h5>Informes egresados</h5>
                                    <br>
                                    <hr>
                                    @foreach($informs_out as $infout)
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="informsOut[]"
                                                           aria-label="Checkbox for following text input"
                                                           value="{{$infout->id}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                   aria-label="Text input with checkbox"
                                                   value="{{$infout->nro}} / {{substr($infout->creation_date, 0, 4)}} - {{$infout->origin}}">
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <hr>
                                <div class="form-row">
                                    <h5>Notas ingresadas</h5>
                                    <br>
                                    <hr>
                                    @foreach($notes_in as $notein)
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="notesIn[]"
                                                           aria-label="Checkbox for following text input"
                                                           value="{{$notein->id}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                   aria-label="Text input with checkbox"
                                                   value="{{$notein->nro}} / {{substr($notein->creation_date, 0, 4)}} - {{$notein->origin}}">
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <hr>
                                <div class="form-row">
                                    <h5>Notas egresadas</h5>
                                    <br>
                                    <hr>
                                    @foreach($notes_out as $noteout)
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="notesOut[]"
                                                           aria-label="Checkbox for following text input"
                                                           value="{{$noteout->id}}">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control"
                                                   aria-label="Text input with checkbox"
                                                   value="{{$noteout->nro}} / {{substr($noteout->creation_date, 0, 4)}} - {{$noteout->origin}}">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary float-right" onclick="console.log('BOTON PRESIONADO');">Guardar</button>
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
