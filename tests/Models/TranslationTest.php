<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 28.10.18
 */

namespace BookingCom\Tests\Models;

use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{
    public function testFromArray(): void
    {
        $translation = \BookingCom\Models\Translation::fromArray([
            'name' => 'Zakynthos Town',
            'language' => 'en',
        ]);

        $this->assertEquals('Zakynthos Town', $translation->getName());
        $this->assertEquals('en', $translation->getLanguage());
    }
}
