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

        $query->whereIdIn([1, 2, 3])
            ->whereCountryIn(['us', 'ru'])
            ->withLocation()
            ->withTimezone();

        $this->assertEquals([
            'city_ids' => '1,2,3',
            'countries' => 'us,ru',
            'extras' => 'location,timezone',
        ], $query->toArray());
    }
}