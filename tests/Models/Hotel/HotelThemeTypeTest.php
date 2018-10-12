<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\HotelThemeType;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class HotelThemeTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelThemeType = HotelThemeType::fromArray([
            'theme_id' => 1,
            'name'     => 'Beach/Seaside',
        ]);

        $this->assertEquals(1, $hotelThemeType->getId());
        $this->assertEquals('Beach/Seaside', $hotelThemeType->getName());
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        HotelThemeType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::HOTEL_THEME_TYPES);
    }
}
