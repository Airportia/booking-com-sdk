<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 14.10.18
 */

namespace BookingCom\Tests\Models;

use BookingCom\Models\HotelFacilityType;
use PHPUnit\Framework\TestCase;

class HotelFacilityTypeTest extends TestCase
{
    public function testFromArray(): void
    {
        $model = HotelFacilityType::fromArray([
            'facility_type_id' => 1,
            'type' => 'boolean',
            'name' => 'Parking',
            'hotel_facility_type_id' => 2,
        ]);

        $this->assertEquals(1, $model->getFacilityTypeId());
        $this->assertEquals('boolean', $model->getType());
        $this->assertEquals('Parking', $model->getName());
        $this->assertEquals(2, $model->getId());
    }
}
