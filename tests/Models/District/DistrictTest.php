<?php

namespace BookingCom\Tests\Models\District;

use BookingCom\Models\District\District;
use BookingCom\Models\Location\Location;
use PHPUnit\Framework\TestCase;

class DistrictTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $district = $this->createDistrictDefaultArray();

        $this->assertEquals('New Kingston', $district->getName());
        $this->assertEquals('jm', $district->getCountry());
        $this->assertEquals(-3752438, $district->getCityId());
        $this->assertEquals(6274, $district->getId());
        $this->assertEquals(37, $district->getNumberOfHotels());
    }


    /**
     * @return void
     */
    public function testLocation(): void
    {
        $district = $this->createDistrictDefaultArray([
            'location' => [
                'latitude'  => '11.116700172424316',
                'longitude' => '-63.91669845581055',
            ],
        ]);

        $this->assertInstanceOf(Location::class, $district->getLocation());
    }

    /**
     * @param array $additionalArray
     * @return District
     */
    public function createDistrictDefaultArray(array $additionalArray = []): District
    {
        $basicArray = [
            'name'        => 'New Kingston',
            'country'     => 'jm',
            'city_id'     => -3752438,
            'district_id' => 6274,
            'nr_hotels'   => 37,
        ];

        $array = array_merge($basicArray, $additionalArray);

        return District::fromArray($array);
    }
}
