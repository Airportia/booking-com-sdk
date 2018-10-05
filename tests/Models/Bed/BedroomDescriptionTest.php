<?php

namespace BookingCom\Tests\Models\Bed;

use BookingCom\Models\Bed\BedroomDescription;
use PHPUnit\Framework\TestCase;

class BedroomDescriptionTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $bedroomDescription = BedroomDescription::fromArray([
            'name'        => 'Bedroom 1',
            'description' => '1 large double bed',
        ]);

        $this->assertEquals('Bedroom 1', $bedroomDescription->getName());
        $this->assertEquals('1 large double bed', $bedroomDescription->getDescription());
    }
}
