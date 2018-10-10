<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\HotelTypesQuery;
use PHPUnit\Framework\TestCase;

class HotelTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new HotelTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 3, 5]);

        $this->assertEquals([
            'hotel_type_ids' => '1,3,5',
        ], $query->toArray());
    }
}
