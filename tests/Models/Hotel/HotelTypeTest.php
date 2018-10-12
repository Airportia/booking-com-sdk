<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\HotelType;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class HotelTypeTest extends TestCase
{

    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelType = HotelType::fromArray([
            'name'          => 'Apartment',
            'hotel_type_id' => 2,
        ]);

        $this->assertEquals('Apartment', $hotelType->getName());
        $this->assertEquals(2, $hotelType->getId());
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        HotelType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::HOTEL_TYPES);
    }
}
