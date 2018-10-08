<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\ChainTypesQuery;
use PHPUnit\Framework\TestCase;

class ChainTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new ChainTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereIdIn([1, 3, 5]);

        $this->assertEquals([
            'chain_ids' => '1,3,5',
        ], $query->toArray());
    }
}
