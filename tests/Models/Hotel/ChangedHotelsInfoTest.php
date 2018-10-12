<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\ChangedHotel;
use BookingCom\Models\Hotel\ChangedHotelsInfo;
use BookingCom\Tests\__support\ArraysProvider;
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
                ],
            ],
        ]);

        $this->assertEquals([1000], $changedHotelsInfo->getClosedHotels());
        $this->assertContainsOnlyInstancesOf(ChangedHotel::class, $changedHotelsInfo->getChangedHotels());
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        ChangedHotelsInfo::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return [ArraysProvider::getItems(ArraysProvider::CHANGED_HOTELS)];
    }
}
