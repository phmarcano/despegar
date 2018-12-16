<?php

namespace App\Entity;

class City extends BaseEntity
{
    private $name;
    private $code;

    public function __construct(int $id, string $code, string $name)
    {
        $this->setId($id);
        $this->setCode($code);
        $this->setName($name);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }
}
