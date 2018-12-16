<?php

namespace App\Utils\Strategies;

use \DateTime;

class LastBusinessDay25Strategy implements ExpirationDayStrategyInterface
{
    public function getExpirationDate(DateTime $reservationDate, int $expirationDays): string
    {
        $currentDay = $reservationDate->format('d');
        $reservationDate->modify(sprintf('first day of next month'));
        if ($currentDay > 25) {
            $reservationDate->modify(sprintf('first day of next month'));
        }
        $reservationDate->modify(sprintf('last weekday'));
        return $reservationDate->format('Y-m-d G:i:s');
    }
}