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
        $validator->assertValue(1);

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValue('1');
    }
}
