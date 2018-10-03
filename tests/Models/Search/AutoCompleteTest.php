<?php

namespace BookingCom\Tests\Models\Search;

use PHPUnit\Framework\TestCase;

class AutoCompleteTest extends TestCase
{
    /**
     * @return void
     */
    public function test(): void
    {
        $autoComplete = AutoComplete::fromArray([
            'right-to-left'    => '0',
            'region'           => 'New South Wales',
            'url'              => 'https://www.booking.com/searchresults.en-gb.html?dest_id=-1603135&dest_type=city&aid=000000',
            'id'               => '-1603135',
            'city_name'        => 'Sydney',
            'nr_dest'          => 601,
            'latitude'         => '-33.8704566955566',
            'language'         => 'en',
            'timezone'         => 'Australia/Sydney',
            'top_destinations' => [
                20058684,
                -666610,
                20023182,
            ],
            'city_ufi'         => '-2140479',
            'nr_hotels'        => 1104,
            'longitude'        => '151.209014892578',
            'label'            => 'Sydney, New South Wales, Australia, Oceania',
            'country_name'     => 'Australia',
            'country'          => 'au',
            'type'             => 'city',
            'name'             => 'Sydney',
        ]);

        $this->assertEquals('0', $autoComplete->getRightToLeft());
        $this->assertEquals('New South Wales', $autoComplete->getRegion());
        $this->assertEquals('https://www.booking.com/searchresults.en-gb.html?dest_id=-1603135&dest_type=city&aid=000000',
            $autoComplete->getUrl());
        $this->assertEquals('-1603135', $autoComplete->getId());
        $this->assertEquals('Sydney', $autoComplete->getCityName());
        $this->assertEquals(601, $autoComplete->getNumberOfDestinations());
        $this->assertEquals('-33.8704566955566', $autoComplete->getLatitude());
        $this->assertEquals('en', $autoComplete->getLanguage());
        $this->assertEquals('Australia/Sydney', $autoComplete->getTimezone());
        $this->assertEquals([
            20058684,
            -666610,
            20023182,
        ], $autoComplete->getTopDestinations());
        $this->assertEquals('-2140479', $autoComplete->getCityUfi());
        $this->assertEquals(1104, $autoComplete->getNumberOfHotels());
        $this->assertEquals('151.209014892578', $autoComplete->getLongtitude());
        $this->assertEquals('Sydney, New South Wales, Australia, Oceania',
            $autoComplete->getLabel());
        $this->assertEquals('Australia', $autoComplete->getCountryName());
        $this->assertEquals('au', $autoComplete->getCountry());
        $this->assertEquals('city', $autoComplete->getType());
        $this->assertEquals('Sydney', $autoComplete->getName());
    }
}
