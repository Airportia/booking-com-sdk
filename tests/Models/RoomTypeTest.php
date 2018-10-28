<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\RoomType;
use BookingCom\Models\Translation;
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
            'name' => 'Apartment',
        ]);

        $this->assertEquals(1, $roomType->getId());
        $this->assertEquals('Apartment', $roomType->getName());
    }

    public function testTranslations(): void
    {
        $roomType = RoomType::fromArray([
            'room_type_id' => 1,
            'name' => 'Apartment',
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

        $this->assertContainsOnlyInstancesOf(Translation::class, $roomType->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $roomType->getTranslation('en')->getName());

        $this->assertNull($roomType->getTranslation('notExistedLanguage'));
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
