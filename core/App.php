<?php

class App
{

    protected static $registry = [];

    public static function bind($key, $data)
    {

        static::$registry[$key] = $data;

    }

    public static function get($key)
    {
        if ( ! array_key_exists($key, static::$registry) ) {
            throw new Exception("No {$key} in App");
        }

        return static::$registry[$key];

    }

}
