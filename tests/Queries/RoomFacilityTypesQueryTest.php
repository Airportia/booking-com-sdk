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

        $query->whereIdIn([1, 3, 5])
            ->whereFacilityIn([1, 2])
            ->whereTypeIn(['boolean']);

        $this->assertEquals([
            'facility_type_ids' => '1,2',
            'room_facility_type_ids' => '1,3,5',
            'types' => 'boolean'
        ], $query->toArray());
    }
}
