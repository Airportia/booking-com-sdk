<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 14.10.18
 */

namespace BookingCom\Tests\Models;

use BookingCom\Models\HotelFacilityType;
use BookingCom\Models\Translation;
use PHPUnit\Framework\TestCase;

class HotelFacilityTypeTest extends TestCase
{
    public function testFromArray(): void
    {
        $model = HotelFacilityType::fromArray([
            'facility_type_id' => 1,
            'type' => 'boolean',
            'name' => 'Parking',
            'hotel_facility_type_id' => 2,
        ]);

        $this->assertEquals(1, $model->getFacilityTypeId());
        $this->assertEquals('boolean', $model->getType());
        $this->assertEquals('Parking', $model->getName());
        $this->assertEquals(2, $model->getId());
    }

    public function testTranslations(): void
    {
        $model = HotelFacilityType::fromArray([
            'facility_type_id' => 1,
            'type' => 'boolean',
            'name' => 'Parking',
            'hotel_facility_type_id' => 2,
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

        $this->assertContainsOnlyInstancesOf(Translation::class, $model->getAllTranslations());

        $this->assertEquals('Zakynthos Town', $model->getTranslation('en')->getName());

        $this->assertNull($model->getTranslation('notExistedLanguage'));
    }
}
