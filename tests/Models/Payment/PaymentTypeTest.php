<?php

namespace BookingCom\Tests\Models\Payment;

use BookingCom\Models\Payment\PaymentType;
use BookingCom\Tests\__support\ArraysProvider;
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

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        PaymentType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::PAYMENT_TYPES);
    }
}
