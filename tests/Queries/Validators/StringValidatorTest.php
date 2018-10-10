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

        $this->assertEquals(null, $validator->assertValues(['test', 'string']));
    }
}
