<?php

namespace BookingCom\Tests\Models\District;

use BookingCom\Models\District;
use BookingCom\Models\Location;
use BookingCom\Models\Translation;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class DistrictTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $district = $this->createDistrictDefaultArray();

        $this->assertEquals('New Kingston', $district->getName());
        $this->assertEquals('jm', $district->getCountry());
        $this->assertEquals(-3752438, $district->getCityId());
        $this->assertEquals(6274, $district->getId());
        $this->assertEquals(37, $district->getNumberOfHotels());
    }

    /**
     * @param array $additionalArray
     * @return \BookingCom\Models\District
     */
    public function createDistrictDefaultArray(array $additionalArray = []): District
    {
        $basicArray = [
            'name'        => 'New Kingston',
            'country'     => 'jm',
            'city_id'     => -3752438,
            'district_id' => 6274,
            'nr_hotels'   => 37,
        ];

        $array = array_merge($basicArray, $additionalArray);

        return District::fromArray($array);
    }

    /**
     * @return void
     */
    public function testLocation(): void
    {
        $district = $this->createDistrictDefaultArray([
            'location' => [
                'latitude'  => '11.116700172424316',
                'longitude' => '-63.91669845581055',
            ],
        ]);

        $this->assertInstanceOf(Location::class, $district->getLocation());
    }

    public function testTranslations(): void
    {
        $district = $this->createDistrictDefaultArray([
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

        $this->assertContainsOnlyInstancesOf(Translation::class, $district->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $district->getTranslation('en')->getName());

        $this->assertNull($district->getTranslation('notExistedLanguage'));
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        District::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::DISTRICTS);
    }
}
