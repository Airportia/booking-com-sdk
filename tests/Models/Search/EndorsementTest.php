<?php

namespace BookingCom\Tests\Models\Search;

use BookingCom\Models\Search\Endorsement;
use PHPUnit\Framework\TestCase;

class EndorsementTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $endorsement = Endorsement::fromArray([
            'name'  => 'Sightseeing',
            'count' => '30565',
            'id'    => '200',
        ]);

        $this->assertEquals('Sightseeing', $endorsement->getName());
        $this->assertEquals('30565', $endorsement->getCount());
        $this->assertEquals('200', $endorsement->getId());
    }
}
