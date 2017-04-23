<?php

namespace frontend\helpers;


class Arrays
{
    public static function nullToEmpty($array)
    {
        foreach ($array as $key=>$element) {
            if ($element === null) {
                $array[$key] = "";
            }
        }
        return $array;
    }
}