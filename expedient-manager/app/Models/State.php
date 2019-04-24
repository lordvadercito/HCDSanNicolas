<?php
/**
 * Created by PhpStorm.
 * User: ADucca
 * Date: 16/02/2019
 * Time: 12:20
 */

namespace App\Models;


use App\Exceptions\JsonHandler;

class State
{
    /**
     * Esta clase contiene los estados que puede tener un expediente
     *
     * @return JSON object
     * */
    public static $states = [
        "Pendiente",
        "En comisión",
        "Aprobado por mayoría",
        "Aprobado por unanimidad",
        "Rechazado por mayoría",
        "Rechazado por unanimidad",
        "Dos despachos",
        "Pase a comisión u oficina",
        "Pase con despacho",
        "Pase sin despacho",
        "Genera pedido (Citación)",
        "Sin tratamiento"
    ];

    public static function encode()
    {
        $result = json_encode(static::$states);
        if ($result) {
            return $result;
        } else {
            throw new JsonHandler($result);
        }
    }


}
