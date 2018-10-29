<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\City;
use BookingCom\Models\City\Timezone;
use BookingCom\Models\Location;
use BookingCom\Models\Translation;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    public function testFromArray(): void
    {
        $city = $this->createCityDefaultArray();

        $this->assertEquals(1, $city->getNumberOfHotels());
        $this->assertEquals(-3875419, $city->getId());
        $this->assertEquals('Pedro Gonzalez', $city->getName());
        $this->assertEquals('ve', $city->getCountry());
    }

    /**
     * @param array $additionalArray
     * @return City
     */
    public function createCityDefaultArray(array $additionalArray = []): City
    {
        $basicArray = [
            'nr_hotels' => 1,
            'city_id' => -3875419,
            'name' => 'Pedro Gonzalez',
            'country' => 've',
        ];

        $array = array_merge($basicArray, $additionalArray);

        return City::fromArray($array);
    }

    public function testLocation(): void
    {
        $city = $this->createCityDefaultArray([
            'location' => [
                'latitude' => '11.116700172424316',
                'longitude' => '-63.91669845581055',
            ],
        ]);

        $this->assertInstanceOf(Location::class, $city->getLocation());
    }

    public function testTimezone(): void
    {
        $city = $this->createCityDefaultArray([
            'timezone' => [
                'offset' => 2,
                'name' => 'Europe/Amsterdam',
            ],
        ]);

        $this->assertInstanceOf(Timezone::class, $city->getTimezone());
    }

    public function testTranslations(): void
    {
        $city = $this->createCityDefaultArray([
            'translations' => [
                [
                    'name' => 'Zakynthos Town',
                    'language' => 'en',
                ],
                [
                    'name' => 'Zákynthos Stadt',
                    'language' => 'de',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(Translation::class, $city->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $city->getTranslation('en')->getName());

        $this->assertNull($city->getTranslation('notExistedLanguage'));
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        City::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::CITIES);
    }
}
