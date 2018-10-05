<?php

namespace BookingCom\Tests\Models\Hotel\HotelInternalObjects;

use BookingCom\Models\Hotel\HotelInternalObjects\CheckinCheckoutTimes;
use PHPUnit\Framework\TestCase;

class CheckinCheckoutTimesTest extends TestCase
{

    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $checkinCheckoutTimes = CheckinCheckoutTimes::fromArray([
            'checkout_to'   => '12:00',
            'checkin_to'    => '22:00',
            'checkin_from'  => '14:00',
            'checkout_from' => '07:00',
        ]);

        $this->assertEquals('12:00', $checkinCheckoutTimes->getCheckout(CheckinCheckoutTimes::UNIT_TO));
        $this->assertEquals('22:00', $checkinCheckoutTimes->getCheckin(CheckinCheckoutTimes::UNIT_TO));
        $this->assertEquals('14:00', $checkinCheckoutTimes->getCheckin(CheckinCheckoutTimes::UNIT_FROM));
        $this->assertEquals('07:00', $checkinCheckoutTimes->getCheckout(CheckinCheckoutTimes::UNIT_FROM));
    }
}
