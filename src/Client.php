<?php

namespace BookingCom;

use BookingCom\Models\City\City;
use BookingCom\Models\Region\Region;

class Client
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * Client constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Region[]
     */
    public function getRegions(): array
    {
        return array_map(function (array $regionArray) {
            return Region::fromArray($regionArray);
        }, $this->connection->execute('/regions'));
    }

    /**
     * @return City[]
     */
    public function getCities(): array
    {
        return array_map(function (array $regionArray) {
            return City::fromArray($regionArray);
        }, $this->connection->execute('/cities'));
    }
}
