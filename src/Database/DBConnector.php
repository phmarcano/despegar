<?php

namespace App\Database;

use PDO;

class DBConnector
{
    /**
     * @var PDO
     */
    protected $con = null;

    /**
     * DBConnector constructor.
     */
    public function __construct()
    {
        $this->con = new PDO($this->getDSN(), $this->getUsername(), $this->getPassword());
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

    }

    private function getDSN(): string
    {
        return getenv('DATABASE_DSN');
    }

    private function getUsername(): string
    {
        return getenv('DATABASE_USERNAME');
    }

    private function getPassword(): string
    {
        return getenv('DATABASE_PASSWORD');
    }
}
