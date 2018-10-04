<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\HotelType;
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
}
