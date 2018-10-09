<?php

namespace BookingCom\Tests\Queries\Validators;


use BookingCom\Queries\Validators\IntegerValidator;
use PHPUnit\Framework\TestCase;

class IntegerValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $validator = new IntegerValidator();

        $this->assertEquals(null , $validator->assertValues([1, 3, 5]));
    }
}