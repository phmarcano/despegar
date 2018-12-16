<?php

namespace App\Repository;

interface RepositoryInterface {

    public function getTableName(): string;

    public function findOneById(int $id);
}
