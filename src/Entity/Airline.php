<?php

namespace App\Entity;

class Airline extends BaseEntity
{
    private $name;
    private $code;
    private $expirationDays;
    private $bookingExpirationStrategy;

    public function __construct(int $id, string $name, string $code, int $expirationDays, string $bookingExpirationStrategy)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setCode($code);
        $this->setExpirationDays($expirationDays);
        $this->setBookingExpirationStrategy($bookingExpirationStrategy);
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

    /**
     * @return mixed
     */
    public function getExpirationDays()
    {
        return $this->expirationDays;
    }

    /**
     * @param mixed $expirationDays
     */
    public function setExpirationDays($expirationDays): void
    {
        $this->expirationDays = $expirationDays;
    }

    /**
     * @return mixed
     */
    public function getBookingExpirationStrategy()
    {
        return $this->bookingExpirationStrategy;
    }

    /**
     * @param mixed $bookingExpirationStrategy
     */
    public function setBookingExpirationStrategy($bookingExpirationStrategy): void
    {
        $this->bookingExpirationStrategy = $bookingExpirationStrategy;
    }
}
