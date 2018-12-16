<?php

namespace App\Utils\Strategies;

use \DateTime;
use \DateInterval;

class BusinessDayStrategy implements ExpirationDayStrategyInterface
{
    public function getExpirationDate(DateTime $reservationDate, int $expirationDays): string
    {
        $reservationDate->modify(sprintf('+%s weekday', $expirationDays));
        return $reservationDate->format('Y-m-d G:i:s');
    }
}