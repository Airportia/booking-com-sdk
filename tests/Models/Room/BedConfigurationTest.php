<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Models\Room;


use BookingCom\Models\Room\BedConfiguration;
use BookingCom\Models\Room\BedType;
use PHPUnit\Framework\TestCase;

class BedConfigurationTest extends TestCase
{
    public function testFromArray()
    {
        $configuration = BedConfiguration::fromArray([
            'bed_types' => [
                [
                    'name' => 'Single bed(s)',
                    'description_imperial' => '35-51 inches wide',
                    'configuration_id' => 2,
                    'description' => '90-130 cm wide',
                    'count' => '1',
                ],
                [
                    'name' => 'Large bed(s) (King size)',
                    'configuration_id' => 2,
                    'description_imperial' => '60-70 inches wide',
                    'description' => '151-180cm wide',
                    'count' => '1',
                ],
            ],
        ]);

        $this->assertCount(2, $configuration->getBedTypes());
        $this->assertContainsOnlyInstancesOf(BedType::class, $configuration->getBedTypes());
    }

}