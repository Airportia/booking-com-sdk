<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;

class TimesTest extends TestCase
{
    public function testFromArray(): void
    {
        $times = \BookingCom\Models\Hotel\Times::fromArray([
            'checkin_from' => '15:00',
            'checkout_from' => '07:00',
            'checkout_to' => '12:00',
            'checkin_to' => '',
        ]);

        $this->assertEquals('15:00', $times->getCheckInFrom());
        $this->assertEquals('07:00', $times->getCheckOutFrom());
        $this->assertEquals('12:00', $times->getCheckOutTo());
        $this->assertEquals(null, $times->getCheckInTo());
    }
}
