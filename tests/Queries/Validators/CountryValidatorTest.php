<?php

namespace BookingCom\Tests\Queries\Validators;


use BookingCom\Queries\Validators\CountryValidator;
use PHPUnit\Framework\TestCase;

class CountryValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $validator = new CountryValidator();

        $this->assertEquals(null, $validator->assertValues(['us', 'ru', 'ua']));
    }
}