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
        $validator->assertValues([1, 3, 5]);

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValues([1, 3, '1']);
    }

    public function testValidateSingleValue(): void
    {
        $validator = new IntegerValidator();
        $validator->assertValues(1);

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValues('1');
    }
}
