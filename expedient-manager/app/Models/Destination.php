<?php

/**
 * Created by PhpStorm.
 * User: ADucca
 * Date: 11/03/2019
 * Time: 21:00
 */

namespace App\Models;

use App\Exceptions\JsonHandler;
use function GuzzleHttp\Promise\all;

class Destination
{
    /**
     * Esta clase contiene los diferentes tipos de destinos que puede tener un expediente.
     * Los mismos se guardan en un objeto JSON ya que solo seran utilizados por la vista correspondiente
     * para agrupar los distintos destinos y sus respectivas tablas (Ej.: Bloque de concejales, Secretarias, Comisiones).
     * Los mismos no representan una entidad en si misma, sino una mera clasificacion para guiar al usuario.
     *
     * @return: JSON Object
     */

    public static $destinations = [
        'Secretaría',
        'Concejo',
        'Legislación general',

    ];


    public static function encode()
    {
        $result = json_encode(static::$destinations);
        if ($result) {
            return $result;
        } else {
            throw new JsonHandler($result);
        }
    }
}
