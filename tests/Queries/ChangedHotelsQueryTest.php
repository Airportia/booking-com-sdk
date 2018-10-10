<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\ChangedHotelsQuery;
use PHPUnit\Framework\TestCase;

class ChangedHotelsQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new ChangedHotelsQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereCityIn([1, 3, 5])
            ->whereCountryIn(['us', 'ru'])
            ->whereRegionIn([1, 5, 10])
            ->whereLastChangeIn(['2018-10-10 00:00:00']);

        $this->assertEquals([
            'city_ids'    => '1,3,5',
            'countries'   => 'us,ru',
            'region_ids'  => '1,5,10',
            'last_change' => '2018-10-10 00:00:00',
        ], $query->toArray());
    }
}
