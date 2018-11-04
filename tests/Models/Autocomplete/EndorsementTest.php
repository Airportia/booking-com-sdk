<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 04.11.18
 */

namespace BookingCom\Tests\Models\Autocomplete;


use PHPUnit\Framework\TestCase;

class EndorsementTest extends TestCase
{
    public function testFromArray(): void
    {
        $model = \BookingCom\Models\Autocomplete\Endorsement::fromArray([
            'id' => 301,
            'name' => 'City Walks',
            'count' => 99095,
        ]);

        $this->assertEquals(301, $model->getId());
        $this->assertEquals('City Walks', $model->getName());
        $this->assertEquals(99095, $model->getCount());
    }

}