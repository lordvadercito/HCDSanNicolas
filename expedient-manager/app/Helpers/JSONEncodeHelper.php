<?php

/**
 * Created by PhpStorm.
 * User: ADucca
 * Date: 11/03/2019
 * Time: 20:41
 */
class JSONEncodeHelper
{
    public static function encode($objectToEnconde)
    {
        $result = json_encode($objectToEnconde);
        if ($result) {
            return $result;
        } else {
            throw new JsonHandler($result);
        }
    }
}

