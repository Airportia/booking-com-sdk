<?php

namespace BookingCom\Tests\Models\Search;

use BookingCom\Models\Search\AutoComplete;
use BookingCom\Models\Search\Endorsement;
use BookingCom\Models\Search\Forecast;
use PHPUnit\Framework\TestCase;

class AutoCompleteTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $autoComplete = $this->createAutoCompleteDefaultArray();

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
        $this->assertEquals('151.209014892578', $autoComplete->getLongitude());
        $this->assertEquals('Sydney, New South Wales, Australia, Oceania',
            $autoComplete->getLabel());
        $this->assertEquals('Australia', $autoComplete->getCountryName());
        $this->assertEquals('au', $autoComplete->getCountry());
        $this->assertEquals('city', $autoComplete->getType());
        $this->assertEquals('Sydney', $autoComplete->getName());
    }

    /**
     * @return void
     */
    public function testEndorsements(): void
    {
        $autoComplete = $this->createAutoCompleteDefaultArray([
            'endorsements' => [
                [
                    'name'  => 'Sightseeing',
                    'count' => '30565',
                    'id'    => '200',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(Endorsement::class,
            $autoComplete->getEndorsements());
    }

    /**
     * @return void
     */
    public function testForecast(): void
    {
        $autoComplete = $this->createAutoCompleteDefaultArray([
            'forecast' => [
                'icon'       => 'sun',
                'max_temp_f' => 63,
                'min_temp_c' => 9,
                'min_temp_f' => 48,
                'max_temp_c' => 17,
            ],
        ]);

        $this->assertInstanceOf(Forecast::class, $autoComplete->getForecast());
    }

    /**
     * @param array|null $additionalArray
     * @return AutoComplete
     */
    public function createAutoCompleteDefaultArray(array $additionalArray = []): AutoComplete
    {
        $basicArray = [
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
        ];

        $array = array_merge($basicArray, $additionalArray);

        return AutoComplete::fromArray($array);
    }
}
