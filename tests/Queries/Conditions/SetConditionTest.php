<?php

namespace Queries\Conditions;

use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use PHPUnit\Framework\TestCase;

class SetConditionTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new SetCondition('offset');
        $this->assertEquals('offset', $rule->getFieldName());
        $this->assertTrue($rule->matchMethod('setOffset'));
    }

    public function testValue(): void
    {
        $rule = new SetCondition('offset');
        $rule->setValue(5);
        $this->assertEquals(5, $rule->getValue());
    }

    public function testValidator(): void
    {
        $rule = new SetCondition('offset', new IntegerValidator());
        $this->expectException(\InvalidArgumentException::class);
        $rule->setValue('6');
    }
}
