<?php

namespace BookingCom\Tests\Models\Hotel\Room;

use BookingCom\Models\Hotel\Room\Facility;
use PHPUnit\Framework\TestCase;

class RoomFacilityTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomFacility = Facility::fromArray([
            'room_facility_type_id' => 1,
            'name'                  => 'Tea/Coffee Maker',
        ]);

        $this->assertEquals(1, $roomFacility->getTypeId());
        $this->assertEquals('Tea/Coffee Maker', $roomFacility->getName());
    }
}
