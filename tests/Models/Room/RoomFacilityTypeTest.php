<?php

namespace BookingCom\Tests\Models\Room;

use BookingCom\Models\Room\RoomFacilityType;
use PHPUnit\Framework\TestCase;

class RoomFacilityTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomFacilityType = RoomFacilityType::fromArray([
            'name'                  => 'Tea/Coffee Maker',
            'room_facility_type_id' => 1,
            'facility_type_id'      => 7,
            'type'                  => 'boolean',
        ]);

        $this->assertEquals('Tea/Coffee Maker', $roomFacilityType->getName());
        $this->assertEquals(1, $roomFacilityType->getId());
        $this->assertEquals(7, $roomFacilityType->getFacilityTypeId());
        $this->assertEquals('boolean', $roomFacilityType->getType());
    }
}
