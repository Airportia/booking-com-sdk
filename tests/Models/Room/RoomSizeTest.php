<?php

namespace BookingCom\Tests\Models\Room;

use PHPUnit\Framework\TestCase;

class RoomSizeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomSize = RoomSize::fromArray([
            'metre_square' => 25,
        ]);

        $this->assertEquals(25, $roomSize->getMetreSquare());
    }
}
