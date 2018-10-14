<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\Room;
use BookingCom\Models\Hotel\Room\Facility;
use BookingCom\Models\Hotel\Room\Info;
use BookingCom\Models\Hotel\Room\Photo;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    public function testFromArray(): void
    {
        $room = Room::fromArray([
            'room_id' => 1000426,
        ]);

        $this->assertEquals(1000426, $room->getId());
    }

    public function testInfo(): void
    {
        $room = Room::fromArray([
            'room_id' => 1000426,
            'room_info' => [
                'bookable' => true,
                'bed_configurations' => [
                    [
                        'bed_types' => [
                            [
                                'name' => 'Single bed(s)',
                                'description_imperial' => '35-51 inches wide',
                                'configuration_id' => 1,
                                'description' => '90-130 cm wide',
                                'count' => '3',
                            ],
                        ],
                    ],
                ],
                'room_type' => 'Triple',
                'room_size' => [
                    'metre_square' => 20,
                ],
                'bedroom_count' => 0,
                'max_price' => 0,
                'min_price' => 0,
                'bathroom_count' => 1,
                'room_type_id' => 7,
                'ranking' => 1002,
                'max_persons' => 3,
            ],
        ]);

        $this->assertInstanceOf(Info::class, $room->getInfo());
    }

    public function testPhotos(): void
    {
        $room = Room::fromArray([
            'room_id' => 1000426,
            'room_photos' => [
                [
                    'url_original' => 'https://example.com/photo1',
                    'url_square60' => 'https://example.com/photo2',
                    'url_max300' => 'https://example.com/photo3',
                ],
            ],
        ]);

        $this->assertNotEmpty($room->getPhotos());
        $this->assertContainsOnlyInstancesOf(Photo::class, $room->getPhotos());
    }

    public function testFacilities(): void
    {
        $room = Room::fromArray([
            'room_id' => 1000426,
            'room_facilities' => [
                [
                    'room_facility_type_id' => 3,
                    'name' => 'Minibar',
                ],
            ],
        ]);
        $this->assertNotEmpty($room->getFacilities());
        $this->assertContainsOnlyInstancesOf(Facility::class, $room->getFacilities());
    }

    public function testDescription(): void
    {
        $room = Room::fromArray([
            'room_id' => 1000426,
            'room_name' => 'Name',
            'room_description' => 'Description',
        ]);

        $this->assertEquals('Name', $room->getName());
        $this->assertEquals('Description', $room->getDescription());
    }
}
