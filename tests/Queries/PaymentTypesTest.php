<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\PaymentTypesQuery;
use PHPUnit\Framework\TestCase;

class PaymentTypesTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new PaymentTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 3, 5]);

        $this->assertEquals([
            'payment_ids' => '1,3,5',
        ], $query->toArray());
    }
}
