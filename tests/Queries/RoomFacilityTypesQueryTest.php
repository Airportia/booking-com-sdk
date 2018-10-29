<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\RoomFacilityTypesQuery;
use PHPUnit\Framework\TestCase;

class RoomFacilityTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new RoomFacilityTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereRoomFacilityTypeIdsIn([1, 3, 5])
            ->whereFacilityTypeIdsIn([1, 2])
            ->whereTypesIn(['boolean'])
            ->withLanguages(['en', 'de']);

        $this->assertEquals([
            'facility_type_ids' => '1,2',
            'room_facility_type_ids' => '1,3,5',
            'types' => 'boolean',
            'languages' => 'en,de',
        ], $query->toArray());
    }
}
