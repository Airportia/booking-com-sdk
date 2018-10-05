<?php

namespace BookingCom\Tests\Models\Payment;

use BookingCom\Models\Payment\PaymentType;
use PHPUnit\Framework\TestCase;

class PaymentTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $paymentType = PaymentType::fromArray([
            'payment_id' => 1,
            'bookable'   => false,
            'name'       => 'American Express',
        ]);

        $this->assertEquals(1, $paymentType->getId());
        $this->assertEquals(false, $paymentType->isBookable());
        $this->assertEquals('American Express', $paymentType->getName());
    }
}
