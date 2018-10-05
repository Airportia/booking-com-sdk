<?php

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;
use BookingCom\Models\Hotel\HotelFacility;

class HotelFacilityTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelFacility = HotelFacility::fromArray([
            'hotel_facility_type_id' => 4,
            'name'                   => 'Pets allowed',
        ]);

        $this->assertEquals(4, $hotelFacility->getHotelFacilityTypeId());
        $this->assertEquals('Pets allowed', $hotelFacility->getName());
    }

    /**
     * @return void
     */
    public function testAttrs(): void
    {
        $hotelFacility = HotelFacility::fromArray([
            'hotel_facility_type_id' => 4,
            'name'                   => 'Pets allowed',
            'attrs'                  => [
                'Extra attribute of this facility.',
            ],
        ]);

        $this->assertEquals(['Extra attribute of this facility.'], $hotelFacility->getAttrs());
    }
}
