<?php

namespace BookingCom\Tests\Queries;

use PHPUnit\Framework\TestCase;
use BookingCom\Queries\HotelThemeTypesQuery;

class HotelThemeTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new HotelThemeTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 3, 5]);

        $this->assertEquals([
            'theme_ids' => '1,3,5',
        ], $query->toArray());
    }
}
