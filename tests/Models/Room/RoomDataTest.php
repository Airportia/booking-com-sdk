<?php

namespace BookingCom\Tests\Models\Room;

use BookingCom\Models\Room\RoomData;
use PHPUnit\Framework\TestCase;

class RoomDataTest extends TestCase
{

    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomData = $this->createRoomDataDefaultArray();

        $this->assertEquals(1000404, $roomData->getId());
        $this->assertEquals('Small Double Room - Annex building', $roomData->getName());
    }

    public function createRoomDataDefaultArray(array $additionalArray = []): RoomData
    {
        $basicArray = [
            'room_id'   => 1000404,
            'room_name' => 'Small Double Room - Annex building',
        ];

        $array = array_merge($basicArray, $additionalArray);

        return RoomData::fromArray($array);
    }

    /**
     * @return void
     */
    public function testRoomFacilities(): void
    {
        $roomData = $this->createRoomDataDefaultArray([
            'room_facilities' => [
                [
                    'room_facility_type_id' => 1,
                    'name'                  => 'Tea/Coffee Maker',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(RoomFacility::class, $roomData->getRoomFacilities());
    }

    /**
     * @return void
     */
    public function testRoomPhotos(): void
    {
        $roomData = $this->createRoomDataDefaultArray([
            'room_photos' => [
                'url_square60' => 'https://aff.bstatic.com/images/hotel/square60/209/20933968.jpg',
                'auto_tags'    => [
                    'tag_id'   => '1',
                    'tag_name' => 'Lounge/Bar',
                ],
                'url_original' => 'https://aff.bstatic.com/images/hotel/max500/209/20933968.jpg',
                'url_max300'   => 'https://aff.bstatic.com/images/hotel/max300/209/20933968.jpg',
                'main_photo'   => true,
                'tags'         => [
                    'Photo of the whole room',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(RoomPhoto::class, $roomData->getRoomPhotos());
    }

    /**
     * @return void
     */
    public function testRoomInfo(): void
    {
        $roomData = $this->createRoomDataDefaultArray([
            'room_info' => [
                'max_price'          => 259,
                'bed_configurations' => [
                    'bed_types'       => [
                        'name'                 => 'Double bed(s)',
                        'count'                => 1,
                        'description_imperial' => '52-59 inches wide',
                        'configuration_id'     => '1',
                        'description'          => '131-150 cm wide',
                    ],
                    'bedroom_count'   => 0,
                    'bookable'        => true,
                    'room_type'       => 'Bed in Dormitory',
                    'ranking'         => 1000,
                    'bedrooms'        => [
                        'name'        => 'Bedroom 1',
                        'description' => '1 large double bed',

                    ],
                    'max_persons'     => 2,
                    'bathroom_count'  => 1,
                    'room_type_id'    => 9,
                    'min_price'       => 179,
                    'roomtype'        => 'Double',
                    'room_size'       => [
                        'metre_square' => 25,
                    ],
                    'room_facilities' => [
                        'room_facility_type_id' => 1,
                        'name'                  => 'Tea/Coffee Maker',
                    ],
                ],
            ],
        ]);

        $this->assertInstanceOf(RoomInfo::class, $roomData->getRoomInfo());
    }

    /**
     * @return void
     */
    public function testHotelDescription(): void
    {
        $roomData = $this->createRoomDataDefaultArray([
            'room_description' => 'This room cannot accommodate any extra beds or baby cots.',
        ]);

        $this->assertEquals('This room cannot accommodate any extra beds or baby cots.', $roomData->getRoomDescription());
    }
}
