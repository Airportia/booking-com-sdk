<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 28.10.18
 */

namespace BookingCom\Tests\Queries\QueryFields;

use BookingCom\Queries\QueryFields\WithArrayQueryField;
use BookingCom\Queries\Validators\CountryValidator;
use PHPUnit\Framework\TestCase;

class WithArrayQueryFieldTest extends TestCase
{
    public function testMatchMethod(): void
    {
        $rule = new WithArrayQueryField('languages', null);
        $this->assertEquals('languages', $rule->getName());
        $this->assertTrue($rule->matchMethod('withLanguages'));
    }

    public function testValue(): void
    {
        $rule = new WithArrayQueryField('languages', null);
        $rule->setValue('withLanguages', ['en', 'de']);
        $this->assertEquals('en,de', $rule->getValue());
    }

    public function testValidator(): void
    {
        $rule = new WithArrayQueryField('languages', new CountryValidator());
        $this->expectException(\InvalidArgumentException::class);
        $rule->setValue('withLanguages', ['aa', 'aaa']);
    }
}
