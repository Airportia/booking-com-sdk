<?php

namespace BookingCom\Tests\Models\Room;

use BookingCom\Models\Room\RoomType;
use BookingCom\Tests\__support\ArraysProvider;
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

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        RoomType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::ROOM_TYPES);
    }
}
