<?php

namespace App\Views\Booking;

use App\Views\BaseView;

class CreateView extends BaseView
{
    public function getViewPath(): string
    {
        return (__DIR__) . '/templates/create.php';
    }
}