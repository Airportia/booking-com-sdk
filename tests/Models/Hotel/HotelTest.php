<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\Hotel;
use BookingCom\Models\Hotel\HotelData;
use BookingCom\Models\Room\RoomData;
use PHPUnit\Framework\TestCase;

class HotelTest extends TestCase
{

    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
        ]);

        $this->assertEquals(10004, $hotel->getId());
    }

    /**
     * @return void
     */
    public function testRoomData(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id'  => 10004,
            'room_data' => [
                'room_id'          => 1000405,
                'room_name'        => 'Small Double Room - Annex building',
                'room_description' => 'This room cannot accommodate any extra beds or baby cots.',
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(RoomData::class, $hotel->getRoomData());
    }

    /**
     * @return void
     */
    public function testHotelData(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id'   => 10004,
            'hotel_data' => [
                'license_number'    => 'AA000000001',
                'hotel_description' => 'test',
            ],
        ]);

        $this->assertInstanceOf(HotelData::class, $hotel->getHotelData());
    }
}
