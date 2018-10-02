<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom;


use BookingCom\Models\City;
use BookingCom\Models\Region;

class Client
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

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