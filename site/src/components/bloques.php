<?php

require_once 'conect.php';

$sql = "SELECT * FROM blocks ";

$result = mysqli_query($db,$sql);


function __integrantes($db,$bloque_id){
    $sqlI = "SELECT * FROM councillors WHERE blocks_id = $bloque_id";
    $ress = mysqli_query($db,$sqlI);

    while($consejales = mysqli_fetch_array($ress))
    {
        echo '<div class="nombre"><p>'.$consejales['surname'].' ,'. $consejales['name'] .'</p></div>  <div class="info"><a class="botonaut" href="">LEER MÁS</a></div>';
    }
}

while($bloque = mysqli_fetch_array($result))
{
    echo '<div class="alianzas">';
        echo '<div class="nombre"><p><span style="color: #81BB4D ; font-size:1.2em;">'. $bloque['name'] .'</span></p></div><div class="info"></div>';
            __integrantes($db,$bloque['id']);
        echo '</div>';
    echo '</div>';
}




