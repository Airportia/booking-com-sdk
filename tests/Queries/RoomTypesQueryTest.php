<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\RoomTypesQuery;
use PHPUnit\Framework\TestCase;

class RoomTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new RoomTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 3, 5]);

        $this->assertEquals([
            'room_type_ids' => '1,3,5',
        ], $query->toArray());
    }
}
