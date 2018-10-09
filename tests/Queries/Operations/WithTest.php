<?php

namespace BookingCom\Tests\Queries\Operations;


use BookingCom\Queries\Operations\With;
use BookingCom\QueryObject;
use PHPUnit\Framework\TestCase;

class WithTest extends TestCase
{
    /**
     * @return void
     */
    public function testOperation(): void
    {
        $operation = new With();
        $values    = $operation->getValues('location', QueryObject::RESULT_IMPLODE);

        $this->assertEquals('location', $operation->getProperty('whereCityIn', ['cityIn', 'typeIn', 'countryIn']));
        $this->assertEquals('1,3,5', $values);
    }
}