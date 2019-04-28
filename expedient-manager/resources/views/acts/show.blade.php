<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Acta {{$act->act_nro}} / {{substr($act->act_date, 0, 4)}}</title>
</head>
    <div class="container-fluid">
        <hr>
        <br>
        <br>
        <div class="row">
            <h1 class="text-center col">Honorable Concejo Deliberante</h1>
        </div>
        <div class="row"><p class="col text-center"><i>de</i></p></div>
        <div class="row">
            <h2 class="text-center col">San Nicolas de los Arroyos</h2>
        </div>
        <br>
        <br>
        <div class="row">
            <h5 class="col text-center"><i>Acta Número:</i></h5>
        </div>
        <div class="row">
            <h4 class="col text-center"><strong>{{$act->act_nro}} / {{substr($act->act_date, 0, 4)}}</strong></h4>
        </div>
        <br>
        <br>
        <div class="row">
                <h5 class="col text-center"><i>Presidente:</i></h5>
        </div>
        <div class="row">
            <h4 class="col text-center"><strong>{{$act->hcd_president}}</strong></h4>
        </div>
        <div class="row">
            <h5 class="col text-center"><i>Secretario:</i></h5>
        </div>
        <div class="row">
            <h4 class="col text-center"><strong>{{$act->hcd_secretary}}</strong></h4>
        </div>
        <br>
        <br>
        <div class="row">
            <h4 class="col text-center"><i>Sesión&nbsp;{{$act->session_type}}</i></h4>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <h4 class="col text-center"><strong>{{date('d-m-Y', strtotime($act->act_date))}}</strong></h4>
        </div>
        <br>
        <br>
        <hr>
        <div class="row">
            <h5 class="col text-center"><strong>Expedientes sobre tablas:</strong></h5>
        </div>
        <div style="page-break-after:always;"></div>
        <div class="row">
            <div class="col text-left"><p>Honorable Consejo Deliberante de San Nicolás de los Arroyos</p></div>
        </div>
        <div class="row">
            <div class="col text-left"><p>Sesión&nbsp;{{$act->session_type}}</p></div>
        </div>
        <div class="row">
            <div class="col text-left"><p>Fecha:&nbsp;{{date('d-m-Y', strtotime($act->act_date))}}&nbsp;|&nbsp;Acta Nro:&nbsp;{{$act->act_nro}}/{{substr($act->act_date, 0, 4)}}</p></div>
        </div>
        <div class="row">
            <div class="col text-left"><p>Inicio de la sesión:&nbsp;{{$act->session_start}}</p></div>
        </div>
        <div class="row">
            <div class="col text-left"><p>Fin de la sesión:&nbsp;{{$act->session_end}}</p></div>
        </div>
        <div class="row">
            <div class="col text-left"><p>Presidente:&nbsp;{{$act->hcd_president}}&nbsp;|&nbsp;Secretario:&nbsp;{{$act->hcd_secretary}}</p></div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col text-center"><p class="font-weight-bold">Asistencia de concejales</p></div>
        </div>
        @foreach(\App\Models\Councillor::all() as $councillor)
            <div class="col-6 border"><p>{{$councillor->surname}},&nbsp;{{$councillor->name}}</p></div>
        @endforeach
    </div>
<script src="js/jquery340.min.js"></script>
<script src="js/bootstrap.min.js"></script>
