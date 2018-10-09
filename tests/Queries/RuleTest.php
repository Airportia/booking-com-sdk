<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Rule;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;
use PHPUnit\Framework\TestCase;

class RuleTest extends TestCase
{
    /**
     * @return void
     */
    public function testRule(): void
    {
        $rule = new Rule('city_ids', new Where(), new IntegerValidator(), QueryObject::RESULT_IMPLODE, 'cityIn');
        $rule->callMethod([1, 3, 5]);

        $this->assertEquals(true, $rule->matchMethod('whereCityIn', ['cityIn', 'idIn', 'countryIn', 'typeIn']));
        $this->assertEquals('1,3,5', $rule->getValues());
        $this->assertEquals('city_ids', $rule->getField());
        $this->assertInstanceOf(Where::class, $rule->getOperation());
        $this->assertInstanceOf(IntegerValidator::class, $rule->getValidator());
        $this->assertEquals(QueryObject::RESULT_IMPLODE, $rule->getResultType());
        $this->assertEquals('cityIn', $rule->getPropertyName());
    }
}
