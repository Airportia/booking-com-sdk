<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\HotelThemeTypesQuery;
use PHPUnit\Framework\TestCase;

class HotelThemeTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new HotelThemeTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereThemeIdsIn([1, 3, 5])
            ->setRows(5)
            ->setOffset(5);

        $this->assertEquals([
            'theme_ids' => '1,3,5',
            'offset'    => 5,
            'rows'      => 5,
        ], $query->toArray());
    }
}
