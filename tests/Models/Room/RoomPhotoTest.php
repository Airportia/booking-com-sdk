<?php

namespace BookingCom\Tests\Models\Room;

use PHPUnit\Framework\TestCase;

class RoomPhotoTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $roomPhoto = $this->createRoomPhotoDefaultArray();

        $this->assertEquals('https://aff.bstatic.com/images/hotel/max500/209/20933968.jpg', $roomPhoto->getUrlOriginal());
    }

    /**
     * @param array $additionalArray
     * @return RoomPhoto
     */
    public function createRoomPhotoDefaultArray(array $additionalArray = []): RoomPhoto
    {
        $basicArray = [
            'url_original' => 'https://aff.bstatic.com/images/hotel/max500/209/20933968.jpg',
            'url_square60' => 'https://aff.bstatic.com/images/hotel/square60/209/20933968.jpg',
            'url_max300'   => 'https://aff.bstatic.com/images/hotel/max300/209/20933968.jpg',
        ];

        $array = array_merge($basicArray, $additionalArray);

        return RoomPhoto::fromArray($array);
    }

    /**
     * @return void
     */
    public function testAutoTags(): void
    {
        $roomPhoto = $this->createRoomPhotoDefaultArray([
            'auto_tags' => [
                [
                    'tag_id'   => '1',
                    'tag_name' => 'Lounge/Bar',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(InlineModel::class, $roomPhoto->getAutoTags());
    }

    /**
     * @return void
     */
    public function testTags(): void
    {
        $roomPhoto = $this->createRoomPhotoDefaultArray([
            'tags' => [
                'Photo of the whole room',
            ],
        ]);

        $this->assertEquals(['Photo of the whole room'], $roomPhoto->getTags());
    }
}
