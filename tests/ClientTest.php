<?php

namespace BookingCom\Tests;


use BookingCom\Client;
use BookingCom\Connection;
use BookingCom\Models\City\City;
use BookingCom\Models\Region\Region;
use BookingCom\Queries\CitiesQuery;
use BookingCom\Queries\RegionsQuery;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @return void
     */
    public function testRegions(): void
    {
        $client = $this->createClient([
            [
                'region_id' => 595,
                'region_type' => 'province',
                'country' => 'ar',
                'name' => 'Entre Rios',
            ],
        ]);

        $regions = $client->getRegions((new RegionsQuery())->setRows(1));
        $this->assertNotEmpty($regions);
        $this->assertContainsOnlyInstancesOf(Region::class, $regions);
    }

    /**
     * @return void
     */
    public function testCities(): void
    {
        $client = $this->createClient([
            [
                'nr_hotels' => 1,
                'location' => [
                    'latitude' => '11.116700172424316',
                    'longitude' => '-63.91669845581055',
                ],
                'city_id' => -3875419,
                'name' => 'Pedro Gonzalez',
                'timezone' => [
                    'offset' => 2,
                    'name' => 'Europe/Amsterdam',
                ],
                'country' => 've',
            ],
        ]);

        $cities = $client->getCities((new CitiesQuery())->setRows(1));

        $this->assertNotEmpty($cities);
        $this->assertContainsOnlyInstancesOf(City::class, $cities);
    }

    /**
     * @param $response
     * @return Client
     */
    private function createClient($response): Client
    {
        $connection = $this->createMock(Connection::class);
        $connection->method('execute')->willReturn($response);

        /** @var Connection $connection */
        return new Client($connection);
    }

}