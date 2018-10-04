<?php

namespace BookingCom\Tests\Models\Chain;

use BookingCom\Models\Chain\ChainType;
use PHPUnit\Framework\TestCase;

class ChainTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $chainType = ChainType::fromArray([
            'chain_id' => 1018,
            'name'     => 'Campanile',
        ]);

        $this->assertEquals(1018, $chainType->getId());
        $this->assertEquals('Campanile', $chainType->getName());
    }
}
