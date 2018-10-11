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
        $query = new ChangedHotelsQuery('2018-10-10 00:00:00');

        $this->assertEquals([
            'last_change' => '2018-10-10 00:00:00',
        ], $query->toArray());

        $query->whereCityIdsIn([1, 3, 5])
            ->whereCountriesIn(['us', 'ru'])
            ->whereRegionIdsIn([1, 5, 10]);

        $this->assertEquals([
            'city_ids'    => '1,3,5',
            'countries'   => 'us,ru',
            'region_ids'  => '1,5,10',
            'last_change' => '2018-10-10 00:00:00',
        ], $query->toArray());
    }
}
