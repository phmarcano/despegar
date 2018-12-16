<?php

namespace App\Entity;

abstract class BaseEntity
{
    private $id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
