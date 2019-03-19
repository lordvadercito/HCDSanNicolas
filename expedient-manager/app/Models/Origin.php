<?php
/**
 * Created by PhpStorm.
 * User: ADucca
 * Date: 11/03/2019
 * Time: 20:26
 */

namespace App\Models;

use App\Exceptions\JsonHandler;

class Origin
{
    /**
     * Esta clase contiene los diferentes tipos de origenes que puede tener un expediente.
     * Los mismos se guardan en un objeto JSON ya que solo seran utilizados por la vista correspondiente
     * para agrupar los distintos origenes y sus respectivas tablas (Ej.: Bloque de concejales, Secretarias, Comisiones).
     * Los mismos no representan una entidad en si misma, sino una mera clasificacion para guiar al usuario.
     *
     * @return: JSON Object
     */

    public static $origins = [
        'Particular',
        'Institución',
        'Departamento Ejecutivo',
        'Bloque(s) de concejales',
        'Comision',
        'Honorable Concejo Deliberante',
        'Concejal(es)',
        'Presidente HCD'

    ];

    public static function encode()
    {
        $result = json_encode(static::$origins);
        if ($result) {
            return $result;
        } else {
            throw new JsonHandler($result);
        }
    }
}