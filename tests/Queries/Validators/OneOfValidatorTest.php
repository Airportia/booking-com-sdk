<?php

namespace BookingCom\Tests\Queries\Validators;

use BookingCom\Queries\Validators\OneOfValidator;
use PHPUnit\Framework\TestCase;

class OneOfValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $validator = new OneOfValidator(['free']);
        $validator->assertValues(['free']);

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValues(['free111']);
    }
}
