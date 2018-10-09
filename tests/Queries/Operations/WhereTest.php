<?php

namespace BookingCom\Tests\Queries\Operations;

use BookingCom\Queries\Operations\Where;
use BookingCom\QueryObject;
use PHPUnit\Framework\TestCase;

class WhereTest extends TestCase
{
    /**
     * @return void
     */
    public function testOperation(): void
    {
        $operation = new Where();
        $values    = $operation->getValues([1, 3, 5], QueryObject::RESULT_IMPLODE);

        $this->assertEquals('cityIn', $operation->getProperty('whereCityIn', ['cityIn', 'typeIn', 'countryIn']));
        $this->assertEquals('1,3,5', $values);
    }
}