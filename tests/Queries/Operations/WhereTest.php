<?php

namespace BookingCom\Tests\Queries\Operations;

use BookingCom\Queries\Operations\Where;
use PHPUnit\Framework\TestCase;

class WhereTest extends TestCase
{
    /**
     * @return void
     */
    public function testOperation(): void
    {
        $operation = new Where();
        $operation->setMethod('whereTestIn');


        $this->assertEquals('whereTestIn', $operation->getMethod());
        $this->assertEquals(true, $operation->matchMethod(['whereTestIn', 'whereIdIn']));
    }
}