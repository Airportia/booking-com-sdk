<?php

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;

class HotelPolicyTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelPolicy = HotelPolicy::fromArray([
            'name'    => 'Groups',
            'content' => 'When booking more than 5 rooms, different policies and additional supplements may apply.\n',
            'type'    => 'POLICY_HOTEL_INTERNET',
        ]);

        $this->assertEquals('Groups', $hotelPolicy->getName());
        $this->assertEquals('When booking more than 5 rooms, different policies and additional supplements may apply.\n', $hotelPolicy->getContent());
        $this->assertEquals('POLICY_HOTEL_INTERNET', $hotelPolicy->getType());
    }
}
