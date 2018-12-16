<?php

namespace App\Repository;

use App\Entity\Airline;

class AirlineRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'airlines';
    }

    /**
     * @param $results
     * @return array
     */
    protected function parseToObjects(array $results): array
    {
        $airlines = [];
        foreach ($results as $result) {
            $airlines[] = $this->parseToObject($result);
        }
        return $airlines;
    }

    /**
     * @param array $result
     * @return Airline Airline
     */
    protected function parseToObject(array $result)
    {
        return new Airline(
            $result['id'],
            $result['name'],
            $result['code'],
            $result['expiration_days'],
            $result['booking_expiration_strategy']);
    }
}
