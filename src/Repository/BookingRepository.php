<?php

namespace App\Repository;

use App\Entity\Booking;
use \PDO;

class BookingRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function getTableName(): string
    {
        return 'bookings';
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $tableName = $this->getTableName();
        $query =
            "SELECT t.id, c.code departure_code,c2.code destination_code, a.code as airline_code,
            t.departure_date,t.arrive_date,t.created_at, t.expiration_date
            FROM $tableName t
            INNER JOIN airlines a ON t.airline_id= a.id
            INNER JOIN cities c ON t.departure_city_id=c.id
            INNER JOIN cities c2 ON t.destination_city_id=c2.id
            ORDER BY t.id";

        $results = [];
        if ($result = $this->con->query($query)) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
        return $this->parseToObjects($results);
    }

    /**
     * @param array $results
     * @return array
     */
    protected function parseToObjects(array $results): array
    {
        $bookings = [];
        foreach ($results as $result) {
            $bookings[] = $this->parseToObject($result);
        }
        return $bookings;
    }

    /**
     * @param array $result
     * @return Booking
     */
    protected function parseToObject(array $result)
    {
        return new Booking(
            $result['id'],
            $result['departure_code'],
            $result['destination_code'],
            $result['departure_date'],
            $result['arrive_date'],
            $result['airline_code'],
            $result['expiration_date'],
            $result['created_at']
        );
    }

    public function save(Booking $booking)
    {
        $tableName = $this->getTableName();
        $sql =
          "INSERT INTO $tableName (airline_id, departure_city_id,destination_city_id,departure_date,
           arrive_date,expiration_date)
           VALUES(:airline,:departure,:destination,:departure_date,:arrive_date,:expiration_date)";
        $query = $this->con->prepare($sql);
        $query->bindValue(':airline', $booking->getAirline());
        $query->bindValue(':departure', $booking->getDeparture());
        $query->bindValue(':destination', $booking->getDestination());
        $query->bindValue(':departure_date', $booking->getDepartureDate());
        $query->bindValue(':arrive_date', $booking->getArriveDate());
        $query->bindValue(':expiration_date', $booking->getExpirationDate());
        $results = $query->execute();
        return $results;
    }
}