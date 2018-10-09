<?php

namespace BookingCom\Tests\Queries\Validators;


use BookingCom\Queries\DistrictsQuery;
use BookingCom\Queries\Validators\OneOfValidator;
use PHPUnit\Framework\TestCase;

class OneOfValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $validator = new OneOfValidator(DistrictsQuery::DISTRICT_TYPES);

        $this->assertEquals(null, $validator->assertValues(['free']));
    }

}