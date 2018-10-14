<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Models;

use BookingCom\Models\AutoTag;
use PHPUnit\Framework\TestCase;

class AutoTagTest extends TestCase
{
    public function testFromArray(): void
    {
        $tag = AutoTag::fromArray([
            'tag_name' => 'Name',
            'tag_id' => 1,
        ]);

        $this->assertEquals('Name', $tag->getName());
        $this->assertEquals(1, $tag->getId());
    }
}
