<?php

namespace Core;

class ValidationExpection extends \Exception
{
    public readonly array $error;
    public readonly array $old;
    
    public static function throw($error, $old) {
        $instance = new static;

        $instance->error = $error;
        $instance->old = $old;

        throw $instance;
    }


}