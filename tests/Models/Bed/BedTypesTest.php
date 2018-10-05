<?php

namespace BookingCom\Tests\Models\Bed;

use BookingCom\Models\Bed\BedType;
use BookingCom\Models\Bed\BedTypes;
use PHPUnit\Framework\TestCase;

class BedTypesTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $bedTypes = BedTypes::fromArray([
            'bed_types' => [
                [
                    'count'                => 1,
                    'configuration_id'     => '1',
                    'description'          => '131-150 cm wide',
                    'description_imperial' => '52-59 inches wide',
                    'name'                 => 'Double bed(s)',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(BedType::class, $bedTypes->getBedTypes());
    }
}
