<?php

/**
 * Autoloader to load all class whose contain in the folder "class"
 */
class Autoloader
{

    static function load()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class)
    {
        require 'class/' . $class . '.php';
    }

}
