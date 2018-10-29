<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Tests\Models\Hotel\Room;

use BookingCom\Models\Photo;
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
        ]);

        $this->assertEquals(
            'https://q-xx.bstatic.com/xdata/images/hotel/max500/20934654.jpg',
            $photo->getUrl()
        );
        $this->assertEquals(
            'https://q-xx.bstatic.com/xdata/images/hotel/max300/20934654.jpg',
            $photo->getUrl(\BookingCom\Models\Photo::SIZE_MAX_300)
        );
        $this->assertEquals(
            'https://q-xx.bstatic.com/xdata/images/hotel/square60/20934654.jpg',
            $photo->getUrl(Photo::SIZE_SQUARE_60)
        );
        $this->assertTrue($photo->isMain());
        $this->assertEquals(['Bedroom'], $photo->getTags());
        $this->assertNotEmpty($photo->getAutoTags());
        $this->assertContainsOnlyInstancesOf(\BookingCom\Models\AutoTag::class, $photo->getAutoTags());
    }

    public function testMainPhoto(): void
    {
        $photo = \BookingCom\Models\Photo::fromArray([
            'url_original' => 'https://q-xx.bstatic.com/xdata/images/hotel/max500/20934654.jpg',
        ]);

        $this->assertEquals(false, $photo->isMain());

        $photo = \BookingCom\Models\Photo::fromArray([
            'url_original' => 'https://q-xx.bstatic.com/xdata/images/hotel/max500/20934654.jpg',
            'main_photo' => false,
        ]);

        $this->assertEquals(false, $photo->isMain());
    }
}
