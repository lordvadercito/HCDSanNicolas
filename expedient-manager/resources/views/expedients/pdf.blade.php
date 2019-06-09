<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Expediente {{$expedient->expedientNro}} / {{substr($expedient->creation_date, 0, 4)}}</title>
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
        <h5 class="col text-center"><i>Expediente Nro.:</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->expedientNro}} / {{substr($expedient->creation_date, 0, 4)}}</strong></h4>
    </div>
    <div class="row">
        <h5 class="col text-center"><i>Nro. D. E.:</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->expedientDENro}}</strong></h4>
    </div>
    <br>
    <br>
    <div class="row">
        <h5 class="col text-center"><i>Tema</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->subject}}</strong></h4>
    </div>
    <div class="row">
        <h5 class="col text-center"><i>Tipo de proyecto</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->projectType}}</strong></h4>
    </div>
    <br>
    <hr>
    <div class="row">
        <h5 class="col text-center"><i>Resumen del expediente</i></h5>
    </div>
    <div class="row">
        <p class="col text-center" style="font-size: 12px;">{{$expedient->excerpt}}</p>
    </div>
    <br>
    <br>
    <hr>
    <div class="row">
        <h5 class="col text-center"><i>Recomendación</i></h5>
    </div>
    <div class="row">
        <p class="col text-center" style="font-size: 12px;">{{$expedient->recommendation}}</p>
    </div>

    <div style="page-break-after:always;"></div>
    <div class="row" style="margin: 0!important;">
        <div class="col text-left"><p style="font-size: 12px;">Honorable Consejo Deliberante de San Nicolás de los Arroyos | Expediente Nro.:&nbsp;{{$expedient->expedientNro}} / {{substr($expedient->creation_date, 0, 4)}}</p></div>
    </div>
    <br>
    <hr>
    <div class="row">
        <h5 class="col text-center"><i>Nro. Ordenanza</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->ordinanceNro}}</strong></h4>
    </div>
    <div class="row">
        <h5 class="col text-center"><i>Nro. Resolución</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->resolutionNro}}</strong></h4>
    </div>
    <div class="row">
        <h5 class="col text-center"><i>Fecha de Ingreso</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->creation_date}}</strong></h4>
    </div>
    <div class="row">
        <h5 class="col text-center"><i>Origen</i></h5>
    </div>
    <div class="row">
        <h4 class="col text-center"><strong>{{$expedient->origin}}</strong></h4>
    </div>
    <br>
    <hr>
    <div class="row">
        <h4 class="col text-center"><i>Anexos</i></h4>
    </div>
    <div class="row">
                <table cellspacing="0" cellpadding="0" align="center" border="1">
        <thead class="border">
        @foreach($expedient->annexes as $annexes)
            <p class="text-center">{{$annexes->expedientNro}} / {{substr($annexes->creation_date, 0, 4)}}</p>
        @endforeach
        </thead>
    </table>
</div>
    <div style="page-break-after:always;"></div>
    <div class="row" style="margin: 0!important;">
        <div class="col text-left"><p style="font-size: 12px;">Honorable Consejo Deliberante de San Nicolás de los Arroyos | Expediente Nro.:&nbsp;{{$expedient->expedientNro}} / {{substr($expedient->creation_date, 0, 4)}}</p></div>
    </div>
    <div class="row">
        <h5 class="col text-center"><i>Carátula</i></h5>
    </div>
    <div class="row" style="margin: 0!important;">
        <div class="col text-left"><p style="font-size: 12px;">{{$expedient->cover}}</p></div>
    </div>

{{--    <div class="row" style="margin: 0!important;">--}}
{{--        <div class="col text-left"><p style="font-size: 12px;">Fecha:&nbsp;{{date('d-m-Y', strtotime($act->act_date))}}&nbsp;|&nbsp;Acta Nro:&nbsp;{{$act->act_nro}}/{{substr($act->act_date, 0, 4)}}</p></div>--}}
{{--    </div>--}}
{{--    <div class="row" style="margin: 0!important;">--}}
{{--        <div class="col text-left"><p style="font-size: 12px;">Inicio de la sesión:&nbsp;{{$act->session_start}}</p></div>--}}
{{--    </div>--}}
{{--    <div class="row" style="margin: 0!important;">--}}
{{--        <div class="col text-left"><p style="font-size: 12px;">Fin de la sesión:&nbsp;{{$act->session_end}}</p></div>--}}
{{--    </div>--}}
{{--    <div class="row" style="margin: 0!important;">--}}
{{--        <div class="col text-left"><p style="font-size: 12px;">Presidente:&nbsp;{{$act->hcd_president}}&nbsp;|&nbsp;Secretario:&nbsp;{{$act->hcd_secretary}}</p></div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <div class="row">--}}
{{--        <div class="col text-center"><p class="font-weight-bold">Asistencia de concejales</p></div>--}}
{{--    </div>--}}
{{--    @foreach(\App\Models\Councillor::all()->sortBy('surname') as $councillor)--}}
{{--        <div class="row">--}}
{{--            <div class="col border" style="height: 16px;"><p style="font-size: 16px;line-height: 14px;">{{$councillor->surname}},&nbsp;{{$councillor->name}}</p></div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    <br>--}}
{{--    <div class="row">--}}
{{--        <table cellspacing="0" cellpadding="0" align="center" border="1">--}}
{{--            <thead class="border">--}}
{{--            @foreach(\App\Models\Block::all() as $block)--}}
{{--                <th scope="col" class="border">&nbsp;{{$block->name}}&nbsp;</th>--}}
{{--                <th scope="col" class="border">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>--}}
{{--            @endforeach--}}
{{--            </thead>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <div class="row">--}}
{{--        <div class="justify-content-center text-center" style="width: 100%;">--}}
{{--            <table cellspacing="0" cellpadding="0" align="center" border="1">--}}
{{--                <thead class="border">--}}
{{--                <th scope="col" class="border" width="40%">&nbsp;Presentes&nbsp;</th>--}}
{{--                <th scope="col" class="border" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>--}}
{{--                <th scope="col" class="border" width="40%">&nbsp;Ausentes&nbsp;</th>--}}
{{--                <th scope="col" class="border" width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>--}}
{{--                </thead>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <br>--}}
{{--    <hr>--}}
{{--    <div class="row">--}}
{{--        <p class="col text-left" style="font-size: 12px;"><strong>Exp. ingresados a sesión fuera del orden del día:</strong></p>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--    </div>--}}
{{--    <hr>--}}
{{--    <div class="row">--}}
{{--        <p class="col text-left" style="font-size: 12px;"><strong>Homenajes:&nbsp;{{$act->tribute}}</strong></p>--}}
{{--    </div>--}}
{{--    <hr>--}}
{{--    <div class="row">--}}
{{--        <p class="col text-left" style="font-size: 12px;"><strong>Observaciones:&nbsp;{{$act->observation}}</strong></p>--}}
{{--    </div>--}}
{{--    <div style="page-break-after:always;"></div>--}}
{{--    <div class="row">--}}
{{--        <table cellspacing="0" cellpadding="0" align="center" border="1">--}}
{{--            <thead class="border">--}}
{{--            <th scope="col" class="border text-center" width="600px">&nbsp;Actas para aprobar&nbsp;</th>--}}
{{--            <th scope="col" class="border">&nbsp;UN&nbsp;</th>--}}
{{--            <th scope="col" class="border">&nbsp;MA&nbsp;</th>--}}
{{--            <th scope="col" class="border">&nbsp;MI&nbsp;</th>--}}
{{--            </thead>--}}
{{--            <tbody class="border">--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            <tr class="border">--}}
{{--                <td scope="col" class="border text-center" width="600px" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--                <td scope="col" class="border" height="30px"></td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
</div>
<script src="js/jquery340.min.js"></script>
<script src="js/bootstrap.min.js"></script>

