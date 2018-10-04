<?php

namespace BookingCom\Tests\Models\Facility;

use BookingCom\Models\Facility\FacilityType;
use PHPUnit\Framework\TestCase;

class FacilityTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $facilityType = FacilityType::fromArray([
            'facility_type_id' => 1,
            'name'             => 'General',
        ]);

        $this->assertEquals(1, $facilityType->getId());
        $this->assertEquals('General', $facilityType->getName());
    }
}
