<?php

namespace BookingCom\Tests\Models\Hotel\HotelInternalObjects;

use PHPUnit\Framework\TestCase;
use BookingCom\Models\Hotel\HotelInternalObjects\AlternativeKeyLocationDetails;

class AlternativeKeyLocationDetailsTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $alternativeKeyLocationDetails = AlternativeKeyLocationDetails::fromArray([
            'city'    => 'string',
            'zip'     => 'string',
            'address' => 'string',
        ]);

        $this->assertEquals('string', $alternativeKeyLocationDetails->getCity());
        $this->assertEquals('string', $alternativeKeyLocationDetails->getZip());
        $this->assertEquals('string', $alternativeKeyLocationDetails->getAddress());
    }
}
