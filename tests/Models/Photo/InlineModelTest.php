<?php

namespace BookingCom\Tests\Models\Photo;

use PHPUnit\Framework\TestCase;

class InlineModelTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $inlineModel = InlineModel::fromArray([
            'tag_id'   => '1',
            'tag_name' => 'Lounge/Bar',
        ]);

        $this->assertEquals('1', $inlineModel->getId());
        $this->assertEquals('Lounge/Bar', $inlineModel->getName());
    }
}
