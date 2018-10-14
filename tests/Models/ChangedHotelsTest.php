<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\ChangedHotels\Change;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class ChangedHotelsTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $changedHotelsInfo = \BookingCom\Models\ChangedHotels::fromArray([
            'closed_hotels'  => [1000],
            'changed_hotels' => [
                [
                    'hotel_id' => 1000,
                    'changes'  => ['hotel_description'],
                ],
            ],
        ]);

        $this->assertEquals([1000], $changedHotelsInfo->getClosedHotels());
        $this->assertContainsOnlyInstancesOf(Change::class, $changedHotelsInfo->getChangedHotels());
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        \BookingCom\Models\ChangedHotels::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return [ArraysProvider::getItems(ArraysProvider::CHANGED_HOTELS)];
    }
}
