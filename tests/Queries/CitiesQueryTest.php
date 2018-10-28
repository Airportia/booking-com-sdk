<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\CitiesQuery;
use PHPUnit\Framework\TestCase;

class CitiesQueryTest extends TestCase
{
    public function testQuery(): void
    {
        $query = new CitiesQuery();
        $this->assertEquals([], $query->toArray());

        $query->whereCityIdsIn([1, 2, 3])
            ->whereCountriesIn(['us', 'ru'])
            ->withLanguages(['en', 'de'])
            ->setOffset(5)
            ->setRows(25)
            ->withLocation()
            ->withTimezone();

        $this->assertEquals([
            'city_ids' => '1,2,3',
            'countries' => 'us,ru',
            'offset' => 5,
            'rows' => 25,
            'extras' => 'location,timezone',
            'languages' => 'en,de',
        ], $query->toArray());
    }
}
