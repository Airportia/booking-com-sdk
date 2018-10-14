<?php

namespace Queries\QueryFields;

use BookingCom\Queries\QueryFields\WithQueryField;
use PHPUnit\Framework\TestCase;

class WithQueryFieldTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new WithQueryField('extras', ['location', 'timezone']);
        $this->assertEquals('extras', $rule->getFieldName());
        $this->assertTrue($rule->matchMethod('withLocation'));
        $this->assertTrue($rule->matchMethod('withTimezone'));
    }

    public function testValue(): void
    {
        $rule = new WithQueryField('extras', ['location', 'timezone']);
        $rule->matchMethod('withLocation');
        $rule->setValue('withLocation');
        $this->assertEquals('location', $rule->getValue());
        $rule->setValue('withTimezone');
        $this->assertEquals('location,timezone', $rule->getValue());
    }
}
