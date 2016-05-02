<?php

/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/2/16
 * Time: 10:05 AM
 */

namespace App;

abstract class Singleton
{

    protected static $instance;

    protected function __construct()
    {
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}