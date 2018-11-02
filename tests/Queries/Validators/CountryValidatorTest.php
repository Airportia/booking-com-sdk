<?php

namespace BookingCom\Tests\Queries\Validators;

use BookingCom\Queries\Validators\CountryValidator;
use PHPUnit\Framework\TestCase;

class CountryValidatorTest extends TestCase
{
    public function testValidator(): void
    {
        $validator = new CountryValidator();
        $validator->assertValue('us');

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValue('us1');
    }
}
