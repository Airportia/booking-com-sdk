<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\Facility;
use PHPUnit\Framework\TestCase;

class FacilityTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelFacility = Facility::fromArray([
            'hotel_facility_type_id' => 4,
            'name' => 'Pets allowed',
        ]);

        $this->assertEquals(4, $hotelFacility->getTypeId());
        $this->assertEquals('Pets allowed', $hotelFacility->getName());
    }

    /**
     * @return void
     */
    public function testAttrs(): void
    {
        $hotelFacility = Facility::fromArray([
            'hotel_facility_type_id' => 4,
            'name' => 'Pets allowed',
            'attrs' => [
                'Extra attribute of this facility.',
            ],
        ]);

        $this->assertEquals(['Extra attribute of this facility.'], $hotelFacility->getAttrs());
    }
}
