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

        $query->whereChainIdsIn([1, 3, 5])->setOffset(4)->setRows(20);

        $this->assertEquals([
            'chain_ids' => '1,3,5',
            'offset'    => 4,
            'rows'      => 20,
        ], $query->toArray());
    }
}
