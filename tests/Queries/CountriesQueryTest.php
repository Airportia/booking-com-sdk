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

        $query->whereCountriesIn(['us', 'ru'])
            ->withLanguages(['en', 'de'])
            ->setRows(5)
            ->setOffset(5);

        $this->assertEquals([
            'countries' => 'us,ru',
            'offset' => 5,
            'rows' => 5,
            'languages' => 'en,de',
        ], $query->toArray());
    }
}
