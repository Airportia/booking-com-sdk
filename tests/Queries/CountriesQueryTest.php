<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\CountriesQuery;
use PHPUnit\Framework\TestCase;

class CountriesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new CountriesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereCountryIn(['us', 'ru']);

        $this->assertEquals([
            'countries' => 'us,ru',
        ], $query->toArray());
    }
}
