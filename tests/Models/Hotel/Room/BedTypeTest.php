<?php

namespace BookingCom\Tests\Models\Hotel\Room;

use PHPUnit\Framework\TestCase;

class BedTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $bedType = \BookingCom\Models\Hotel\Room\BedType::fromArray([
            'count'                => 1,
            'configuration_id'     => '1',
            'description'          => '131-150 cm wide',
            'description_imperial' => '52-59 inches wide',
            'name'                 => 'Double bed(s)',
        ]);

        $this->assertEquals(1, $bedType->getCount());
        $this->assertEquals('1', $bedType->getConfigurationId());
        $this->assertEquals('131-150 cm wide', $bedType->getDescription());
        $this->assertEquals('52-59 inches wide', $bedType->getDescriptionImperial());
        $this->assertEquals('Double bed(s)', $bedType->getName());
    }
}
