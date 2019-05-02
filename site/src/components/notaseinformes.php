<?php

require_once 'conect.php';


$sql = "SELECT * FROM notes";

$result = mysqli_query($db, $sql);


function __tipoNI($tipo){
    if($tipo == 'N'){
       return 'NOTA';
    } elseif($tipo == 'I'){
        return 'INFORME';
    }else {
        return 'error';
    }
}

function __direccion($dir){
    if($dir == 'E'){
        return 'Entrante';
    }elseif($dir == 'S'){
        return 'Saliente';
    }else{
        return 'Error';
    }
}

while($n_i = mysqli_fetch_array($result))
{
    echo '<tr>';
        echo '<td>'. $n_i['nro'] . '</td>' ;
        echo '<td>'. __tipoNI($n_i['type']). ' - ' . __direccion($n_i['direction']) . '</td>' ;
        echo '<td>'. $n_i['creation_date'] . '</td>' ;
        echo '<td>'. $n_i['origin'] . '</td>' ;
        echo '<td> '.  $n_i['expedient_id'] . ' </td>' ;
        echo '<td>'. $n_i['description'] . '</td>' ;
    echo '</tr>';
}
