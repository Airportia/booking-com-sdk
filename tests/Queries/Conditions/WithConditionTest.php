<?php

namespace Queries\Conditions;

use BookingCom\Queries\Conditions\WithCondition;
use PHPUnit\Framework\TestCase;

class WithConditionTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new WithCondition('extras', null, ['location', 'timezone']);
        $this->assertEquals('extras', $rule->getFieldName());
        $this->assertTrue($rule->matchMethod('withLocation'));
        $this->assertTrue($rule->matchMethod('withTimezone'));
    }

    public function testValue(): void
    {
        $rule = new WithCondition('extras', null, ['location', 'timezone']);
        $rule->matchMethod('withLocation');
        $rule->setValue();
        $this->assertEquals('location', $rule->getValue());
    }
}
