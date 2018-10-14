<?php

namespace BookingCom\Tests\Queries\Validators;

use BookingCom\Queries\Validators\StringValidator;
use PHPUnit\Framework\TestCase;

class StringValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $validator = new StringValidator();
        $validator->assertValues(['test', 'string']);

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValues(['test', 111]);
    }
}
