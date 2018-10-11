<?php

namespace BookingCom\Tests\Queries;

use PHPUnit\Framework\TestCase;
use BookingCom\Queries\RegionsQuery;

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
            ->setRows(5)
            ->setOffset(5);

        $this->assertEquals([
            'region_ids'   => '1,2,3,4',
            'countries'    => 'us,ru,uk',
            'region_types' => 'island,province',
            'offset'         => 5,
            'rows'           => 5,
        ], $query->toArray());
    }
}
