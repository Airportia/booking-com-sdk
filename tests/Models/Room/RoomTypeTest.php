<?php

namespace BookingCom\Tests\Models\Room;

use BookingCom\Models\Room\RoomType;
use PHPUnit\Framework\TestCase;

class RoomTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomType = RoomType::fromArray([
            'room_type_id' => 1,
            'name'         => 'Apartment',
        ]);

        $this->assertEquals(1, $roomType->getId());
        $this->assertEquals('Apartment', $roomType->getName());
    }
}
