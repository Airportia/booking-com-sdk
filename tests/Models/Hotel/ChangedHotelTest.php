<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\ChangedHotel;
use PHPUnit\Framework\TestCase;

class ChangedHotelTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $changedHotel = ChangedHotel::fromArray([
            'hotel_id' => 1000,
            'changes'  => [
                'hotel_description',
            ],
        ]);

        $this->assertEquals(1000, $changedHotel->getId());
        $this->assertEquals(['hotel_description'], $changedHotel->getChanges());
    }
}
