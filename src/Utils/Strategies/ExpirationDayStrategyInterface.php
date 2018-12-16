<?php
namespace App\Utils\Strategies;
use \DateTime;

interface ExpirationDayStrategyInterface
{
    public function getExpirationDate(DateTime $reservationDate,int $expirationDays):string;
}