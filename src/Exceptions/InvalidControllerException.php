<?php

namespace App\Exceptions;

use \Exception;

class InvalidControllerException extends Exception
{
    public function __construct(string $message = "", int $code = 0)
    {
        $message = "Invalid action";
        $code = 400;
        parent::__construct($message, $code);
    }
}