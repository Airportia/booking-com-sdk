<?php

use BookingCom\Models\Country\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /** @return void */
    public function testFromArray(): void
    {
        $country = Country::fromArray([
            'name'    => 'United Arab Emirates',
            'country' => 'ae',
            'area'    => 'Middle East',
        ]);

        $this->assertEquals('United Arab Emirates', $country->getName());
        $this->assertEquals('ae', $country->getCountry());
        $this->assertEquals('Middle East', $country->getArea());
    }
}
