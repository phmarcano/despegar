<?php

namespace App\Views\Booking;

use App\Views\BaseView;

class ListView extends BaseView
{
    public function getViewPath(): string
    {
        return (__DIR__) . '/templates/list.php';
    }
}