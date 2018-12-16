<?php

namespace App\Exceptions;

use \Exception;

class UnsupportedStrategyException extends Exception
{
    public function __construct(string $message = "", int $code = 0)
    {
        $message = "Unsupported strategy";
        $code = 500;
        parent::__construct($message, $code);
    }
}