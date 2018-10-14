<?php

namespace BookingCom\Tests\Models\ChangedHotels;

use BookingCom\Models\ChangedHotels\Change;
use PHPUnit\Framework\TestCase;

class ChangeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $changedHotel = Change::fromArray([
            'hotel_id' => 1000,
            'changes'  => [
                'hotel_description',
            ],
        ]);

        $this->assertEquals(1000, $changedHotel->getId());
        $this->assertEquals(['hotel_description'], $changedHotel->getChanges());
    }
}
