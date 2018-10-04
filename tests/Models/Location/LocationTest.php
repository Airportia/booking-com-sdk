<?php

namespace BookingCom\Tests\Models\Location;

use BookingCom\Models\Location\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testFromArray(): void
    {
        $location = Location::fromArray([
            'latitude'  => '11.116700172424316',
            'longitude' => '-63.91669845581055',
        ]);
        $this->assertEquals('11.116700172424316', $location->getLatitude());
        $this->assertEquals('-63.91669845581055', $location->getLongitude());
    }
}