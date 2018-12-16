<?php

namespace App\Repository;

use App\Database\DBConnector as Connector;
use PDO;

abstract class BaseRepository extends Connector implements RepositoryInterface
{

    public function getTableName(): string
    {
        return null;
    }

    public function findOneById(int $id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id=:id', $this->getTableName());
        $query = $this->con->prepare($sql);
        if ($query->execute(['id' => $id])) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $this->parseToObject($result);
        }
        return null;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $query = "SELECT * FROM " . $this->getTableName();
        $results = [];
        if ($result = $this->con->query($query)) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $row;
            }
        }
        return $this->parseToObjects($results);
    }

    protected abstract function parseToObject(array $results);

    protected abstract function parseToObjects(array $results): array;
}
