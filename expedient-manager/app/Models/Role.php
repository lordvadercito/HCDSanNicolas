<?php
/**
 * Created by PhpStorm.
 * User: ADucca
 * Date: 23/03/2019
 * Time: 21:22
 */

namespace App\Models;

use App\Exceptions\JsonHandler;

class Role
{
    /**
     * Esta clase contiene los diferentes tipos de roles que puede tener un usuario.
     * Los mismos se guardan en un objeto JSON ya que solo seran utilizados para la validacion de permisos
     * Los mismos no representan una entidad en si misma, sino una mera clasificacion para restringir acciones del usuario.
     *
     * @return: JSON Object
     */

    public static $roles = [
        'Administrador',
        'Usuario',
        'Solo lectura'
    ];

    public static function encode()
    {
        $result = json_encode(static::$roles);
        if ($result) {
            return $result;
        } else {
            throw new JsonHandler($result);
        }
    }

}