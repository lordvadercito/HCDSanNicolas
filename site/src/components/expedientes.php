<?php

require_once 'conect.php';


$sql = "SELECT * FROM expedients";

$result = mysqli_query($db, $sql);

while($expediente = mysqli_fetch_array($result))
{   echo '<tr>';
    echo "<td> ". $expediente['expedientNro'] ."</td>" ;
    echo "<td> ". $expediente['expedientDENro'] ."</td>" ;
    echo "<td> ". $expediente['creation_date'] ."</td>" ;
    echo "<td> ". $expediente['origin'] ."</td>" ;
    echo "<td> ". $expediente['projectType'] ."</td>" ;
    echo "<td> ". $expediente['subject'] ."</td>" ;
    echo "<td> ". $expediente['state'] ."</td>" ;
    echo "<td> ". $expediente['state'] ."</td>" ;
    echo "<td> ". $expediente['state'] ."</td>" ;
    echo "<td> ". $expediente['state'] ."</td>" ;
    echo "<td> ". $expediente['incomeRecord'] ."</td>" ;
    echo "<td> ". $expediente['treatmentRecord'] ."</td>" ;
    echo "<td> ". $expediente['state'] ."</td>" ;
    echo "<td> ". $expediente['cover'] ."</td>" ;
    echo '</tr>';
}