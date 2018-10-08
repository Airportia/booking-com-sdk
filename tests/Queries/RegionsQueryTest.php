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

        $query->whereIdIn([1, 2, 3, 4])
            ->whereCountryIn(['us', 'ru', 'uk'])
            ->whereTypeIn(['island', 'province']);

        $this->assertEquals([
            'region_ids'   => '1,2,3,4',
            'countries'    => 'us,ru,uk',
            'region_types' => 'island,province',
        ], $query->toArray());
    }
}
