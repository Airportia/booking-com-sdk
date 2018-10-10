<?php

namespace BookingCom\Tests\Queries\Operations;


use BookingCom\Queries\Operations\With;
use PHPUnit\Framework\TestCase;

class WithTest extends TestCase
{
    /**
     * @return void
     */
    public function testOperation(): void
    {
        $operation = new With();
        $operation->setMethod('withLocation');


        $this->assertEquals('withLocation', $operation->getMethod());
        $this->assertEquals('location', $operation->getValue());
        $this->assertEquals(true, $operation->matchMethod(['withLocation', 'withTimezone']));
    }
}