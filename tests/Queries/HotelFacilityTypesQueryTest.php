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

        $query->whereFacilityTypeIdsIn([1, 4, 5])
            ->withLanguages(['en', 'de'])
            ->whereHotelFacilityTypeIdsIn([1, 3, 5])
            ->whereTypesIn(['string', 'integer']);

        $this->assertEquals([
            'facility_type_ids' => '1,4,5',
            'hotel_facility_type_ids' => '1,3,5',
            'types' => 'string,integer',
            'languages' => 'en,de',
        ], $query->toArray());
    }
}
