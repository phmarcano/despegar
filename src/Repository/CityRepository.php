<?php

namespace App\Repository;

use App\Entity\City;

class CityRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'cities';
    }

    /**
     * @param $results
     * @return array
     */
    protected function parseToObjects(array $results): array
    {
        $cities = [];
        foreach ($results as $result) {
            $cities[] = $this->parseToObject($result);
        }
        return $cities;
    }

    protected function parseToObject(array $result)
    {
        return new City($result['id'], $result['code'], $result['name']);
    }
}
