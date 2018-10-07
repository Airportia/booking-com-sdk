<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\Photo;
use PHPUnit\Framework\TestCase;

class PhotoTest extends TestCase
{
    public function testFromArray(): void
    {
        $photo = Photo::fromArray([
            'url_original' => 'https://q-xx.bstatic.com/xdata/images/hotel/max500/20934654.jpg',
            'main_photo' => true,
            'url_max300' => 'https://q-xx.bstatic.com/xdata/images/hotel/max300/20934654.jpg',
            'url_square60' => 'https://q-xx.bstatic.com/xdata/images/hotel/square60/20934654.jpg',
            'tags' => [
                'Bedroom',
            ],
            'auto_tags' => [
                [
                    'tag_id' => 1,
                    'tag_name' => 'tag1',
                ],
            ],
            'is_logo_photo' => true,
        ]);

        $this->assertEquals('https://q-xx.bstatic.com/xdata/images/hotel/max500/20934654.jpg',
            $photo->getUrl());
        $this->assertEquals('https://q-xx.bstatic.com/xdata/images/hotel/max300/20934654.jpg',
            $photo->getUrl(Photo::SIZE_MAX_300));
        $this->assertEquals('https://q-xx.bstatic.com/xdata/images/hotel/square60/20934654.jpg',
            $photo->getUrl(Photo::SIZE_SQUARE_60));
        $this->assertTrue($photo->isMain());
        $this->assertEquals(['Bedroom'], $photo->getTags());
        $this->assertNotEmpty($photo->getAutoTags());
        $this->assertTrue($photo->isLogo());
        $this->assertContainsOnlyInstancesOf(\BookingCom\Models\AutoTag::class, $photo->getAutoTags());
    }

}