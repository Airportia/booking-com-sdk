<?php

namespace BookingCom;

use BookingCom\Models\City\City;
use BookingCom\Models\Region\Region;
use BookingCom\Queries\CitiesQuery;
use BookingCom\Queries\RegionsQuery;

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
     * @param RegionsQuery $query
     * @return Region[]
     */
    public function getRegions(RegionsQuery $query = null): array
    {
        return $this->runQuery('/regions', Region::class, $query);
    }

    /**
     * @param CitiesQuery|null $query
     * @return City[]
     */
    public function getCities(CitiesQuery $query = null): array
    {
        return $this->runQuery('/cities', City::class, $query);
    }

    /**
     * @param QueryObject $query
     * @return array
     */
    private function getQueryParams(QueryObject $query = null): array
    {
        return $query === null ? [] : $query->toArray();
    }

    private function runQuery(string $uri, string $targetClass, QueryObject $query = null): array
    {
        $params = $this->getQueryParams($query);
        return array_map(function (array $modelArray) use ($targetClass) {
            return \call_user_func([$targetClass, 'fromArray'], $modelArray);
        }, $this->connection->execute($uri, $params));
    }
}
