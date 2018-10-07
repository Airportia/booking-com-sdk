<?php

namespace BookingCom\Tests\Models\Room;

use BookingCom\Models\Room\RoomFacility;
use PHPUnit\Framework\TestCase;

class RoomFacilityTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomFacility = RoomFacility::fromArray([
            'room_facility_type_id' => 1,
            'name'                  => 'Tea/Coffee Maker',
        ]);

        $this->assertEquals(1, $roomFacility->getTypeId());
        $this->assertEquals('Tea/Coffee Maker', $roomFacility->getName());
    }
}
