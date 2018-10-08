<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\HotelFacilityTypesQuery;
use PHPUnit\Framework\TestCase;

class HotelFacilityTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new HotelFacilityTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 3, 5])
            ->whereFacilityIn([1, 4, 5])
            ->whereTypeIn(['string', 'integer']);

        $this->assertEquals([
            'facility_type_ids'       => '1,4,5',
            'hotel_facility_type_ids' => '1,3,5',
            'types'                   => 'string,integer',
        ], $query->toArray());
    }
}
