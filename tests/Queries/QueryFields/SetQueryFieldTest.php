<?php

namespace Queries\QueryFields;

use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\Validators\IntegerValidator;
use PHPUnit\Framework\TestCase;

class SetQueryFieldTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new SetQueryField('offset');
        $this->assertEquals('offset', $rule->getFieldName());
        $this->assertTrue($rule->matchMethod('setOffset'));
    }

    public function testValue(): void
    {
        $rule = new SetQueryField('offset');
        $rule->setValue(5, 'withOffset');
        $this->assertEquals(5, $rule->getValue());
    }

    public function testValidator(): void
    {
        $rule = new SetQueryField('offset', new IntegerValidator());
        $this->expectException(\InvalidArgumentException::class);
        $rule->setValue('6', 'withOffset');
    }
}
