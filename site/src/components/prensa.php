<?php

require_once 'conect.php';

$sql = "SELECT * FROM news";

$result = mysqli_query($db,$sql);


while($noticia = mysqli_fetch_array($result))
{
    echo '<div style="border: 3px ;">';
        echo '<div>';
        echo '<h5>'.$noticia['title']. '</h5>';
            echo '<p>'. $noticia['body'] .'</p>';
            echo '<div>';
                echo '<p><strong>'. $noticia['public_at'] .'</strong></p>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}