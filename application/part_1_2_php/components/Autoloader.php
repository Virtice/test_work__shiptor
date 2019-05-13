<?php

namespace application\part_1_2_php\components;


class Autoloader
{
    public static function init()
    {
        spl_autoload_register(function ($className) {
            include $className . '.php';
        });
    }
}