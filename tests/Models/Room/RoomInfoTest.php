<?php

namespace BookingCom\Tests\Models\Room;

use PHPUnit\Framework\TestCase;

class RoomInfoTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomInfo = $this->createRoomInfoDefaultArray();

        $this->assertEquals(true, $roomInfo->isBookable());
        $this->assertEquals(259, $roomInfo->getMaxPrice()());
        $this->assertEquals('Double', $roomInfo->getRoomtype());
        $this->assertEquals(2, $roomInfo->getMaxPersons());
        $this->assertEquals('Bed in Dormitory', $roomInfo->getRoomType());
        $this->assertContainsOnlyInstancesOf(BedConfiguration::class, $roomInfo->getBedConfigurations());
        $this->assertEquals(9, $roomInfo->getRoomTypeId());
        $this->assertEquals(1000, $roomInfo->getRanking());
        $this->assertEquals(1, $roomInfo->getBathroomCount());
        $this->assertInstanceOf(RoomSize::class, $roomInfo->getRoomSize());
        $this->assertEquals(0, $roomInfo->getBedroomCount());
        $this->assertEquals(179, $roomInfo->getMinPrice());
    }

    /**
     * @param array $additionalArray
     * @return RoomInfo
     */
    public function createRoomInfoDefaultArray(array $additionalArray = []): RoomInfo
    {
        $basicArray = [
            'bookable'           => true,
            'max_price'          => 259,
            'roomtype'           => 'Double',
            'max_persons'        => 2,
            'room_type'          => 'Bed in Dormitory',
            'bed_configurations' => [
                [
                    'bed_types' => [
                        [
                            'count'                => 1,
                            'configuration_id'     => '1',
                            'description'          => '131-150 cm wide',
                            'description_imperial' => '52-59 inches wide',
                            'name'                 => 'Double bed(s)',
                        ],
                    ],
                ],
            ],
            'room_type_id'       => 9,
            'ranking'            => 1000,
            'bathroom_count'     => 1,
            'room_size'          => [
                'metre_square' => 25,
            ],
            'bedroom_count'      => 0,
            'min_price'          => 179,
        ];

        $array = array_merge($basicArray, $additionalArray);

        return RoomInfo::fromArray($array);
    }

    /**
     * @return void
     */
    public function testBedrooms(): void
    {
        $roomInfo = $this->createRoomInfoDefaultArray([
            'bedrooms' => [
                [
                    'name'        => 'Bedroom 1',
                    'description' => '1 large double bed',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(Bedroom::class, $roomInfo->getBedrooms());
    }
}
