<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Acta {{$dayOrder->acts->act_nro}} / {{substr($dayOrder->acts->act_date, 0, 4)}}</title>
</head>
<div class="container-fluid">
    <hr>
    <h5 class="text-center">Orden del día</h5>
    <div class="row">
        <div class="col text-center">
            <h6><i>Acta Nro.:&nbsp;{{$dayOrder->acts->act_nro}} / {{substr($dayOrder->acts->act_date, 0, 4)}}</i></h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <h6 class="text-left">Informes y notas</h6>
    </div>

    @foreach($dayOrder->notes->sortBy('type') as $note)
        <div class="row">
            <div class="col border" style="height: 90px;"><p class="text-left"
                                                             style="font-size: 16px;line-height: 20px;">{{$note->nro}}
                    / {{substr($note->creation_date, 0, 4)}}&nbsp; - &nbsp;{{$note->description}}&nbsp; -
                    &nbsp;{{$note->type =='N' ? 'Nota' : 'Informe'}}&nbsp; - &nbsp;{{$note->direction == 'E' ? 'Ingreso' : 'Despacho'}}</p></div>
        </div>
    @endforeach
    <div style="page-break-after:always;"></div>
    <hr>
    <h5 class="text-center">Orden del día</h5>
    <div class="row">
        <div class="col text-center">
            <h6><i>Acta Nro.:&nbsp;{{$dayOrder->acts->act_nro}} / {{substr($dayOrder->acts->act_date, 0, 4)}}</i></h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <h6 class="text-left">Expedientes</h6>
    </div>

    @foreach($dayOrder->expedients->sortBy('state') as $expedient)
        <div class="row">
            <div class="col border" style="height: 90px;"><p class="text-left"
                                                             style="font-size: 16px;line-height: 20px;">{{$expedient->expedientNro}}
                    / {{substr($expedient->creation_date, 0, 4)}}&nbsp; - &nbsp;{{$expedient->subject}}&nbsp; -
                    &nbsp;{{$expedient->cover}}&nbsp; - &nbsp;{{$expedient->state}}</p></div>
        </div>
    @endforeach
</div>
<script src="js/jquery340.min.js"></script>
<script src="js/bootstrap.min.js"></script>
