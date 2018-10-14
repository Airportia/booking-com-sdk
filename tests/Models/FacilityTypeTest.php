<?php

namespace BookingCom\Tests\Models;

use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class FacilityTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $facilityType = \BookingCom\Models\FacilityType::fromArray([
            'facility_type_id' => 1,
            'name'             => 'General',
        ]);

        $this->assertEquals(1, $facilityType->getId());
        $this->assertEquals('General', $facilityType->getName());
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        \BookingCom\Models\FacilityType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::FACILITY_TYPES);
    }
}
