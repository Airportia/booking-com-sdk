<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\RoomFacilityType;
use BookingCom\Models\Translation;
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
            'name' => 'Tea/Coffee Maker',
            'room_facility_type_id' => 1,
            'facility_type_id' => 7,
            'type' => 'boolean',
        ]);

        $this->assertEquals('Tea/Coffee Maker', $roomFacilityType->getName());
        $this->assertEquals(1, $roomFacilityType->getId());
        $this->assertEquals(7, $roomFacilityType->getFacilityTypeId());
        $this->assertEquals('boolean', $roomFacilityType->getType());
    }

    public function testTranslations(): void
    {
        $roomFacilityType = RoomFacilityType::fromArray([
            'name' => 'Tea/Coffee Maker',
            'room_facility_type_id' => 1,
            'facility_type_id' => 7,
            'type' => 'boolean',
            'translations' => [
                [
                    'name' => 'Zakynthos Town',
                    'language' => 'en',
                ],
                [
                    'name' => 'Zákynthos Stadt',
                    'language' => 'de',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(Translation::class, $roomFacilityType->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $roomFacilityType->getTranslation('en')->getName());

        $this->assertNull($roomFacilityType->getTranslation('notExistedLanguage'));
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
