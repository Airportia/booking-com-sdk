<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\Translation;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class HotelTypeTest extends TestCase
{

    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelType = \BookingCom\Models\HotelType::fromArray([
            'name'          => 'Apartment',
            'hotel_type_id' => 2,
        ]);

        $this->assertEquals('Apartment', $hotelType->getName());
        $this->assertEquals(2, $hotelType->getId());
    }

    public function testTranslations(): void
    {
        $hotelType = \BookingCom\Models\HotelType::fromArray([
            'name'          => 'Apartment',
            'hotel_type_id' => 2,
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

        $this->assertContainsOnlyInstancesOf(Translation::class, $hotelType->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $hotelType->getTranslation('en')->getName());

        $this->assertNull($hotelType->getTranslation('notExistedLanguage'));
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        \BookingCom\Models\HotelType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::HOTEL_TYPES);
    }
}
