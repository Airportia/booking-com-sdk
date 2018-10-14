<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\RoomFacilityType;
use BookingCom\Tests\__support\ArraysProvider;
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

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        RoomFacilityType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::ROOM_FACILITY_TYPES);
    }
}
