<?php
namespace App\Utils\Strategies;

use \DateTime;

class NormalDayStrategy implements ExpirationDayStrategyInterface
{
    public function getExpirationDate(DateTime $reservationDate, int $expirationDays):string
    {
        $reservationDate->modify(sprintf('+%s day', $expirationDays));
        return $reservationDate->format('Y-m-d G:i:s');
    }
}