<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\DistrictsQuery;
use PHPUnit\Framework\TestCase;

class DistrictsQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new DistrictsQuery();
        $this->assertEquals([], $query->toArray());
        $query->whereCityIdsIn([1, 3, 5])
            ->whereCountriesIn(['us', 'ru'])
            ->whereDistrictIdsIn([1, 3, 5])
            ->whereDistrictTypesIn(['free'])
            ->setRows(5)
            ->setOffset(5)
            ->withLanguages(['en', 'de'])
            ->withLocation();

        $this->assertEquals([
            'city_ids' => '1,3,5',
            'countries' => 'us,ru',
            'district_ids' => '1,3,5',
            'district_types' => 'free',
            'offset' => 5,
            'rows' => 5,
            'extras' => 'location',
            'languages' => 'en,de',
        ], $query->toArray());
    }
}
