<?php

namespace App\Entity;

class Booking extends BaseEntity
{
    private $departure;
    private $destination;
    private $departureDate;
    private $arriveDate;
    private $airline;
    private $expirationDate;
    private $createdAt;

    public function __construct(
        int $id,
        string $departure,
        string $destination,
        string $departureDate,
        string $arriveDate,
        string $airline,
        string $expirationDate,
        string $createdAt=null
    )
    {
        $this->setId($id);
        $this->setDeparture($departure);
        $this->setDestination($destination);
        $this->setDepartureDate($departureDate);
        $this->setArriveDate($arriveDate);
        $this->setAirline($airline);
        $this->setExpirationDate($expirationDate);
        $this->setCreatedAt($createdAt);
    }

    /**
     * @return mixed
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param mixed $departure
     */
    public function setDeparture($departure): void
    {
        $this->departure = $departure;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination): void
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * @return mixed
     */
    public function getDepartureDateUTC()
    {
        $datetime = new \DateTime($this->getDepartureDate());
        return $datetime->format('Ymd\TH:i:s') . 'Z'; // ISO8601
    }

    /**
     * @param mixed $departureDate
     */
    public function setDepartureDate($departureDate): void
    {
        $this->departureDate = $departureDate;
    }

    /**
     * @return mixed
     */
    public function getArriveDate()
    {
        return $this->arriveDate;
    }

    /**
     * @return mixed
     */
    public function getArriveDateUTC()
    {
        $datetime = new \DateTime($this->getArriveDate());
        return $datetime->format('Ymd\TH:i:s') . 'Z'; // ISO8601
    }

    /**
     * @param mixed $arriveDate
     */
    public function setArriveDate($arriveDate): void
    {
        $this->arriveDate = $arriveDate;
    }

    /**
     * @return mixed
     */
    public function getAirline()
    {
        return $this->airline;
    }

    /**
     * @param mixed $airline
     */
    public function setAirline($airline): void
    {
        $this->airline = $airline;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    }

    public function getExpirationDate()
    {
        return $this->expirationDate;
    }
}
