<?php

namespace Queries\Conditions;

use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use PHPUnit\Framework\TestCase;

class WhereInConditionTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new WhereInCondition('cities_ids');
        $this->assertEquals('cities_ids', $rule->getFieldName());
        $this->assertTrue($rule->matchMethod('whereCitiesIdsIn'));
    }

    public function testValue(): void
    {
        $rule = new WhereInCondition('cities_ids');
        $rule->setValue([1, 2, 3]);
        $this->assertEquals('1,2,3', $rule->getValue());
    }

    public function testValidator(): void
    {
        $rule = new WhereInCondition('cities_ids', new IntegerValidator());
        $this->expectException(\InvalidArgumentException::class);
        $rule->setValue([1, 'aaa', 3]);
    }
}
