<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\DistrictsQuery;
use PHPUnit\Framework\TestCase;

class DistrictsQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new DistrictsQuery();

//        $this->assertEquals([], $query->toArray());

        $query->whereCityIn([1, 3, 5])
            ->whereCountryIn(['us', 'ru'])
            ->whereIdIn([1, 3, 5])
            ->whereTypeIn(['free']);
//            ->withLocation();

        $this->assertEquals([
            'city_ids'       => '1,3,5',
            'countries'      => 'us,ru',
            'district_ids'   => '1,3,5',
            'district_types' => 'free',
//            'extras'         => 'location',
        ], $query->toArray());
    }
}
