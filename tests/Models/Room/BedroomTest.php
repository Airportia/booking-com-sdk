<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Models\Room;


use BookingCom\Models\Room\Bedroom;
use PHPUnit\Framework\TestCase;

class BedroomTest extends TestCase
{
    public function testFromArray(): void
    {
        $bedroom = Bedroom::fromArray([
            'name' => 'Bedroom 1',
            'description' => '1 large double bed',
        ]);

        $this->assertEquals('Bedroom 1', $bedroom->getName());
        $this->assertEquals('1 large double bed', $bedroom->getDescription());
    }

}