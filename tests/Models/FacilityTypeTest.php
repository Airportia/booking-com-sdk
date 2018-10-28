<?php

namespace BookingCom\Tests\Models;

use BookingCom\Models\Translation;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class FacilityTypeTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $facilityType = \BookingCom\Models\FacilityType::fromArray([
            'facility_type_id' => 1,
            'name'             => 'General',
        ]);

        $this->assertEquals(1, $facilityType->getId());
        $this->assertEquals('General', $facilityType->getName());
    }

    public function testTranslations(): void
    {
        $facilityType = \BookingCom\Models\FacilityType::fromArray([
            'facility_type_id' => 1,
            'name'             => 'General',
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

        $this->assertContainsOnlyInstancesOf(Translation::class, $facilityType->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $facilityType->getTranslation('en')->getName());

        $this->assertNull($facilityType->getTranslation('notExistedLanguage'));
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        \BookingCom\Models\FacilityType::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::FACILITY_TYPES);
    }
}
