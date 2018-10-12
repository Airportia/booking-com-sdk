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
        $date = new \DateTime();
        $query = (new ChangedHotelsQuery($date))
            ->whereCityIdsIn([1, 3, 5])
            ->whereCountriesIn(['us', 'ru'])
            ->whereRegionIdsIn([1, 5, 10])
            ->setLastChange($date);

        $this->assertEquals([
            'city_ids' => '1,3,5',
            'countries' => 'us,ru',
            'region_ids' => '1,5,10',
            'last_change' => $date->format('Y-m-d H:i:s'),
        ], $query->toArray());
    }
}
