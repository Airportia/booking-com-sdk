<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Queries;


use PHPUnit\Framework\TestCase;

class CitiesQueryTest extends TestCase
{
    public function testQuery(): void
    {
        $query = new \BookingCom\Queries\CitiesQuery();
        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 2, 3])
            ->whereCountryIn(['us', 'ru'])
            ->withLocation()
            ->withTimezone();

        $this->assertEquals([
            'city_ids' => '1,2,3',
            'countries' => 'us,ru',
            'extras' => 'location,timezone',
        ], $query->toArray());
    }
}