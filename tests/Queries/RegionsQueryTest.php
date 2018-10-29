<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\RegionsQuery;
use PHPUnit\Framework\TestCase;

class RegionsQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new RegionsQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereRegionIdsIn([1, 2, 3, 4])
            ->whereCountriesIn(['us', 'ru', 'uk'])
            ->whereRegionTypesIn(['island', 'province'])
            ->withLanguages(['en', 'de'])
            ->setRows(5)
            ->setOffset(5);

        $this->assertEquals([
            'region_ids' => '1,2,3,4',
            'countries' => 'us,ru,uk',
            'region_types' => 'island,province',
            'offset' => 5,
            'rows' => 5,
            'languages' => 'en,de',
        ], $query->toArray());
    }
}
