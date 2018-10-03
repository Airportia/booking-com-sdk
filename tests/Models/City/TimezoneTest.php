<?php

namespace BookingCom\Tests\Models\City;


use BookingCom\Models\City\Timezone;
use PHPUnit\Framework\TestCase;

class TimezoneTest extends TestCase
{
    public function testFromArray(): void
    {
        $timezone = Timezone::fromArray([
            'offset' => 2,
            'name'   => 'Europe/Amsterdam',
        ]);

        $this->assertEquals(2, $timezone->getOffset());
        $this->assertEquals('Europe/Amsterdam', $timezone->getName());
    }

}