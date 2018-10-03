<?php

namespace BookingCom\Tests;


use BookingCom\Client;
use BookingCom\ConnectionInterface;
use BookingCom\Models\City\City;
use BookingCom\Models\Region\Region;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @return void
     */
    public function testRegions(): void
    {
        $client = $this->createClient('getRegions', [
            [
                'region_id'   => 595,
                'region_type' => 'province',
                'country'     => 'ar',
                'name'        => 'Entre Rios',
            ],
        ]);

        $regions = $client->getRegions();
        $this->assertNotEmpty($regions);

        foreach ($regions as $region) {
            $this->assertInstanceOf(Region::class, $region);
        }
    }

    /**
     * @return void
     */
    public function testCities(): void
    {
        $client = $this->createClient('getCities', [
            [
                'nr_hotels' => 1,
                'location'  => [
                    'latitude'  => '11.116700172424316',
                    'longitude' => '-63.91669845581055',
                ],
                'city_id'   => -3875419,
                'name'      => 'Pedro Gonzalez',
                'timezone'  => [
                    'offset' => 2,
                    'name'   => 'Europe/Amsterdam',
                ],
                'country'   => 've',
            ],
        ]);

        $cities = $client->getCities();

        foreach ($cities as $city) {
            $this->assertInstanceOf(City::class, $city);
        }
    }

    /**
     * @param $method
     * @param $response
     * @return Client
     */
    private function createClient(string $method, $response): Client
    {
        $connection = $this->createMock(ConnectionInterface::class);
        $connection->method($method)->willReturn($response);

        /** @var ConnectionInterface $connection */
        return new Client($connection);
    }

}