<?php

namespace App\Views;

abstract class BaseView
{
    /**
     * @param array $objects
     * @return mixed
     */
    public function render(array $objects)
    {
        extract($objects);
        ob_start();
        require_once $this->getViewPath();
        $buffer = ob_get_clean();
        return $buffer;
    }

    public abstract function getViewPath():string;
}