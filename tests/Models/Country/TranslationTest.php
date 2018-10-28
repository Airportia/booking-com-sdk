<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 29.10.18
 */

namespace BookingCom\Tests\Models\Country;


use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{
    public function testFromArray(): void
    {
        $translation = \BookingCom\Models\Country\Translation::fromArray([
            'name' => 'United Arab Emirates',
            'area' => 'Middle East',
            'language' => 'en',
        ]);

        $this->assertEquals('United Arab Emirates', $translation->getName());
        $this->assertEquals('en', $translation->getLanguage());
        $this->assertEquals('Middle East', $translation->getArea());
    }
}