<?php

namespace BookingCom\Tests\Models\Region;

use BookingCom\Models\Region\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase
{
    public function testFromArray(): void
    {
        $region = Region::fromArray([
            'region_id'   => 595,
            'region_type' => 'province',
            'country'     => 'ar',
            'name'        => 'Entre Rios',
        ]);

        $this->assertEquals('Entre Rios', $region->getName());
        $this->assertEquals(595, $region->getId());
        $this->assertEquals(Region::TYPE_PROVINCE, $region->getRegionType());
        $this->assertEquals('ar', $region->getCountry());
    }
}