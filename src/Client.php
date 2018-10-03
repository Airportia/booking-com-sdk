<?php

namespace BookingCom;


use BookingCom\Models\City\City;
use BookingCom\Models\Region\Region;

class Client
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * Client constructor.
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
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
        }, $this->connection->getRegions());
    }

    /**
     * @return City[]
     */
    public function getCities(): array
    {
        return array_map(function (array $regionArray) {
            return City::fromArray($regionArray);
        }, $this->connection->getCities());
    }
}