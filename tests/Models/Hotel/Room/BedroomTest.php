<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Models\Hotel\Room;

use PHPUnit\Framework\TestCase;

class BedroomTest extends TestCase
{
    public function testFromArray(): void
    {
        $bedroom = \BookingCom\Models\Hotel\Room\Bedroom::fromArray([
            'name' => 'Bedroom 1',
            'description' => '1 large double bed',
        ]);

        $this->assertEquals('Bedroom 1', $bedroom->getName());
        $this->assertEquals('1 large double bed', $bedroom->getDescription());
    }
}
