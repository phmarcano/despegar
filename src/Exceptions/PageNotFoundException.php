<?php

namespace App\Exceptions;

use \Exception;

class PageNotFoundException extends Exception
{
    public function __construct(string $message = "", int $code = 0)
    {
        $message = "Page not found";
        $code = 404;
        parent::__construct($message, $code);
    }
}