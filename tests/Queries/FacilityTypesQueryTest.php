<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\FacilityTypesQuery;
use PHPUnit\Framework\TestCase;

class FacilityTypesQueryTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new FacilityTypesQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereFacilityTypeIdsIn([1, 3, 5]);

        $this->assertEquals([
            'facility_type_ids' => '1,3,5',
        ], $query->toArray());
    }
}