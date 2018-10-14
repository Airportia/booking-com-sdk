<?php

namespace BookingCom\Tests\Models\Chain;

use BookingCom\Models\ChainType;
use BookingCom\Tests\__support\ArraysProvider;
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

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        ChainType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::CHAIN_TYPES);
    }
}
