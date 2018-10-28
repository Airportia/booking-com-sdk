<?php

namespace BookingCom\Tests\Models\Country;

use BookingCom\Models\Country;
use BookingCom\Models\Country\Translation;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /** @return void */
    public function testFromArray(): void
    {
        $country = Country::fromArray([
            'name' => 'United Arab Emirates',
            'country' => 'ae',
            'area' => 'Middle East',
        ]);

        $this->assertEquals('United Arab Emirates', $country->getName());
        $this->assertEquals('ae', $country->getCountry());
        $this->assertEquals('Middle East', $country->getArea());
    }

    public function testTranslations(): void
    {
        $country = Country::fromArray([
            'name' => 'United Arab Emirates',
            'country' => 'ae',
            'area' => 'Middle East',
            'translations' => [
                [
                    'name' => 'Zakynthos Town',
                    'language' => 'en',
                    'area' => 'Middle East',
                ],
                [
                    'name' => 'Zákynthos Stadt',
                    'language' => 'de',
                    'area' => 'Mittlerer Osten',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(Translation::class, $country->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $country->getTranslation('en')->getName());
        $this->assertEquals('Middle East', $country->getTranslation('en')->getArea());

        $this->assertNull($country->getTranslation('notExistedLanguage'));
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        Country::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::COUNTRIES);
    }
}
