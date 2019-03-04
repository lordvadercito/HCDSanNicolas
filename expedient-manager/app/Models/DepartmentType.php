<?php
/**
 * Created by PhpStorm.
 * User: ADucca
 * Date: 04/03/2019
 * Time: 02:18
 */

namespace App\Models;

use App\Exceptions\JsonHandler;

class DepartmentType
{
    /**
     * Esta clase contiene los tipos de departamentos existente
     * Ej.: Bloque de concejales, Secretaria, etc.
     *
     * @return JSON Object
     */
    public static $departmentTypes = [
        "Bloque de concecales",
        "Secretaría externa",
        "Secretaría interna",
        "Otro"
    ];

    public static function encode()
    {
        $result = json_encode(static::$departmentTypes);
        if ($result) {
            return $result;
        } else {
            throw new JsonHandler($result);
        }
    }
}