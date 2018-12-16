<?php

namespace App\Utils\Strategies;

use \DateTime;

class LastBusinessDayStrategy implements ExpirationDayStrategyInterface
{
    public function getExpirationDate(DateTime $reservationDate, int $expirationDays): string
    {
        $reservationDate->modify(sprintf('first day of next month'));
        $reservationDate->modify(sprintf('last weekday'));
        return $reservationDate->format('Y-m-d G:i:s');
    }
}