<?php

namespace Queries\QueryFields;

use BookingCom\Queries\QueryFields\WithQueryField;
use PHPUnit\Framework\TestCase;

class WithQueryFieldTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new WithQueryField('extras', null, ['location', 'timezone']);
        $this->assertEquals('extras', $rule->getFieldName());
        $this->assertTrue($rule->matchMethod('withLocation'));
        $this->assertTrue($rule->matchMethod('withTimezone'));
    }

    public function testValue(): void
    {
        $rule = new WithQueryField('extras', null, ['location', 'timezone']);
        $rule->matchMethod('withLocation');
        $rule->setValue(null, 'withLocation');
        $this->assertEquals('location', $rule->getValue());
    }
}
