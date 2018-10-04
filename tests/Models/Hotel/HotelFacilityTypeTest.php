<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\HotelFacilityType;
use PHPUnit\Framework\TestCase;

class HotelFacilityTypeTest extends TestCase
{

    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelFacilityType = HotelFacilityType::fromArray([
            'hotel_facility_type_id' => 2,
            'type'                   => 'boolean',
            'facility_type_id'       => 1,
            'name'                   => 'Parking',
        ]);

        $this->assertEquals(2, $hotelFacilityType->getId());
        $this->assertEquals('boolean', $hotelFacilityType->getType());
        $this->assertEquals(1, $hotelFacilityType->getFacilityTypeId());
        $this->assertEquals('Parking', $hotelFacilityType->getName());
    }
}
