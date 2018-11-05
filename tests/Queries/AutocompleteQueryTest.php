<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 05.11.18
 */

namespace BookingCom\Tests\Queries;

use PHPUnit\Framework\TestCase;

class AutocompleteQueryTest extends TestCase
{
    public function testQuery(): void
    {
        $query = new \BookingCom\Queries\AutocompleteQuery('test', 'en');
        $query->setAffiliateId(1)
            ->withEndorsements()
            ->withThemes()
            ->withForecast()
            ->withTimezones();

        $this->assertEquals([
            'text' => 'test',
            'language' => 'en',
            'affiliate_id' => 1,
            'extras' => 'endorsements,themes,forecast,timezones',
        ], $query->toArray());
    }
}
