<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 03.11.18
 */

namespace BookingCom\Tests\Models;


use BookingCom\Models\Autocomplete\Endorsement;
use BookingCom\Models\AutocompleteItem;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class AutocompleteItemTest extends TestCase
{
    public function testFromArray(): void
    {
        $item = $this->createAutocomplete();

        $this->assertEquals(-2140479, $item->getId());
        $this->assertEquals('city', $item->getType());
        $this->assertEquals('https://www.booking.com/searchresults.en-gb.html?dest_id=-2140479&dest_type=city&aid=1613783',
            $item->getUrl());
        $this->assertEquals('Amsterdam', $item->getName());
        $this->assertEquals(null, $item->getCityUfi());
        $this->assertEquals('Noord-Holland', $item->getRegion());
        $this->assertEquals('Amsterdam, Noord-Holland, Netherlands', $item->getLabel());
        $this->assertEquals('nl', $item->getCountry());
        $this->assertEquals('Amsterdam', $item->getCityName());
        $this->assertEquals('en', $item->getLanguage());
        $this->assertEquals('Netherlands', $item->getCountryName());
        $this->assertFalse($item->isRightToLeft());
        $this->assertEquals(2137, $item->getNumberOfHotels());
        $this->assertEquals(52.3728981018066, $item->getLocation()->getLatitude());
        $this->assertEquals(4.89300012588501, $item->getLocation()->getLongitude());
    }

    public function testTimezone(): void
    {
        $item = $this->createAutocomplete([
            'timezone' => 'Europe/Amsterdam',
        ]);

        $this->assertEquals('Europe/Amsterdam', $item->getTimezone());
    }

    public function testEndorsements(): void
    {
        $item = $this->createAutocomplete([
            'endorsements' => [
                [
                    'count' => 110593,
                    'name' => 'Museums',
                    'id' => 43,
                ],
            ],
        ]);

        $this->assertCount(1, $item->getEndorsements());
        $this->assertContainsOnlyInstancesOf(Endorsement::class, $item->getEndorsements());
    }

    public function testThemes(): void
    {
        $item = $this->createAutocomplete([
            'nr_dest' => 2259,
            'top_destinations' => [
                -1502554,
                -666610,
                -2601889,
            ],
        ]);

        $this->assertEquals(2259, $item->getNumberOfDestionations());
        $this->assertEquals([-1502554, -666610, -2601889,], $item->getTopDestinations());
    }

    public function testForecast(): void
    {
        $item = $this->createAutocomplete([
            'forecast' => [
                'icon' => 'sun',
                'max_temp_c' => 11,
                'min_temp_c' => 4,
                'max_temp_f' => 52,
                'min_temp_f' => 39,
            ],
        ]);

        $this->assertNotNull($item->getForecast());

    }

    public function createAutocomplete(array $additionalArray = []): AutocompleteItem
    {
        $basicArray = [
            'id' => '-2140479',
            'type' => 'city',
            'url' => 'https://www.booking.com/searchresults.en-gb.html?dest_id=-2140479&dest_type=city&aid=1613783',
            'name' => 'Amsterdam',
            'city_ufi' => null,
            'region' => 'Noord-Holland',
            'label' => 'Amsterdam, Noord-Holland, Netherlands',
            'country' => 'nl',
            'city_name' => 'Amsterdam',
            'longitude' => '4.89300012588501',
            'language' => 'en',
            'country_name' => 'Netherlands',
            'latitude' => '52.3728981018066',
            'right-to-left' => 0,
            'nr_hotels' => 2137,
        ];

        $array = array_merge($basicArray, $additionalArray);

        return AutocompleteItem::fromArray($array);
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        AutocompleteItem::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::AUTOCOMPLETE);
    }
}