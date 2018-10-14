<?php

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;

class PaymentDetailTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $paymentDetail = \BookingCom\Models\Hotel\PaymentDetail::fromArray([
            'bookable'     => true,
            'payment_id'   => 3,
            'payable'      => true,
            'cvc_required' => false,
        ]);

        $this->assertEquals(true, $paymentDetail->isBookable());
        $this->assertEquals('3', $paymentDetail->getPaymentId());
        $this->assertEquals(true, $paymentDetail->isPayable());
        $this->assertEquals(false, $paymentDetail->isCvcRequired());
    }
}
