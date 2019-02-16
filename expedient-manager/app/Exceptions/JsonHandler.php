<?php

namespace App\Exceptions;

use Exception;


class JsonHandler extends Exception
{
    /**
     * Esta clase maneja los errores generados por las conversiones a objetos JSON
     *
     * @return void
     */
    public function report()
    {
    }

// Array con los mensajes de error
    protected static $mensajes = array(
        JSON_ERROR_NONE => 'No ha habido ningún error',
        JSON_ERROR_DEPTH => 'Se ha alcanzado el máximo nivel de profundidad',
        JSON_ERROR_STATE_MISMATCH => 'JSON inválido o con formato incorrecto',
        JSON_ERROR_CTRL_CHAR => 'Error de control de caracteres, posiblemente incorrectamente codificado',
        JSON_ERROR_SYNTAX => 'Error de sintaxis',
        JSON_ERROR_UTF8 => 'Caracteres UTF-8 mal formados, verifique la codificacion de los mismos');


    public function render($request)
    {
        return response()->view(
            'errors.custom',
            array(
                'exception' => (static::$mensajes[json_last_error()])
            )
        );
    }
}