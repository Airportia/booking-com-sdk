<?php

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;

class HotelPhotoTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $hotelPhoto = $this->createHotelPhotoDefaultArray();

        $this->assertEquals('https://aff.bstatic.com/images/hotel/max500/106/106787402.jpg', $hotelPhoto->getUrlOriginal());
        $this->assertEquals('https://aff.bstatic.com/images/hotel/max300/106/106787402.jpg', $hotelPhoto->getUrlMax300());
        $this->assertEquals('https://aff.bstatic.com/images/hotel/square60/106/106787402.jpg', $hotelPhoto->getUrlSquare60());
    }

    /**
     * @param array $additionalArray
     * @return HotelPhoto
     */
    public function createHotelPhotoDefaultArray(array $additionalArray = []): HotelPhoto
    {
        $basicArray = [
            'url_original' => 'https://aff.bstatic.com/images/hotel/max500/106/106787402.jpg',
            'url_max300'   => 'https://aff.bstatic.com/images/hotel/max300/106/106787402.jpg',
            'url_square60' => 'https://aff.bstatic.com/images/hotel/square60/106/106787402.jpg',
        ];

        $array = array_merge($basicArray, $additionalArray);

        return HotelPhoto::fromArray($array);
    }

    /**
     * @return void
     */
    public function testTags(): void
    {
        $hotelPhoto = $this->createHotelPhotoDefaultArray([
            'tags' => [
                'Bedroom',
            ],
        ]);

        $this->assertEquals(['Bedroom'], $hotelPhoto->getTags());
    }

    /**
     * @return void
     */
    public function testMainPhoto(): void
    {
        $hotelPhoto = $this->createHotelPhotoDefaultArray([
            'main_photo' => true,
        ]);

        $this->assertEquals(true, $hotelPhoto->getMainPhoto());
    }

    /**
     * @return void
     */
    public function testAutoTags(): void
    {
        $hotelPhoto = $this->createHotelPhotoDefaultArray([
            'auto_tags' => [
                [
                    'tag_id'   => '1',
                    'tag_name' => 'Lounge/Bar',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(InlineModel::class, $hotelPhoto->getAutoTags());
    }

    /**
     * @return void
     */
    public function testIsLogoPhoto(): void
    {
        $hotelPhoto = $this->createHotelPhotoDefaultArray([
            'is_logo_photo' => true,
        ]);

        $this->assertEquals(true, $hotelPhoto->isLogoPhoto());
    }
}
