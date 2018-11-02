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
        $validator->assertValue('test');

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValue(111);
    }

    public function testLength(): void
    {
        $validator = StringValidator::make(['length' => 2]);
        $validator->assertValue('ab');

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValue('test');
    }
}
