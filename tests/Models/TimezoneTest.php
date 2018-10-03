<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom\Tests\Models;


use BookingCom\Models\Timezone;
use PHPUnit\Framework\TestCase;

class TimezoneTest extends TestCase
{
    public function testFromArray(): void
    {
        $timezone = Timezone::fromArray([
            'offset' => 2,
            'name' => 'Europe/Amsterdam',
        ]);

        $this->assertEquals(2, $timezone->getOffset());
        $this->assertEquals('Europe/Amsterdam', $timezone->getName());
    }

}