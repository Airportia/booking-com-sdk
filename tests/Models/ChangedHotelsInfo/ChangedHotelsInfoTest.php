<?php

use BookingCom\Models\ChangedHotelsInfo\ChangedHotelsInfo;
use BookingCom\Models\ChangedHotelsInfo\ChangedHotel;
use PHPUnit\Framework\TestCase;

class ChangedHotelsInfoTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $changedHotelsInfo = ChangedHotelsInfo::fromArray([
            'closed_hotels'  => [1000],
            'changed_hotels' => [
                [
                    'hotel_id' => 1000,
                    'changes'  => ['hotel_description'],
                ]
            ],
        ]);

        $this->assertEquals([1000], $changedHotelsInfo->getClosedHotels());
        $this->assertContainsOnlyInstancesOf(ChangedHotel::class, $changedHotelsInfo->getChangedHotels());
    }
}
