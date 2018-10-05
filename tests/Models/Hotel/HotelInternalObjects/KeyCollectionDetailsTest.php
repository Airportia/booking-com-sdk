<?php

namespace BookingCom\Tests\Models\Hotel\HotelInternalObjects;

use PHPUnit\Framework\TestCase;
use BookingCom\Models\Hotel\HotelInternalObjects\KeyCollectionDetails;
use BookingCom\Models\Hotel\HotelInternalObjects\AlternativeKeyLocationDetails;

class KeyCollectionDetailsTest extends TestCase
{
    /**
     * @return void
     */
    public function testFromArray(): void
    {
        $keyCollectionDetails = $this->createKeyLocationDetailsDefaultArray();

        $this->assertEquals('at_the_property', $keyCollectionDetails->getKeyLocation());
        $this->assertEquals('lock_box', $keyCollectionDetails->getHowToCollect());
    }

    public function createKeyLocationDetailsDefaultArray(array $additionalArray = []): KeyCollectionDetails
    {
        $basicArray = [
            'key_location'   => 'at_the_property',
            'how_to_collect' => 'lock_box',
        ];

        $array = array_merge($basicArray, $additionalArray);

        return KeyCollectionDetails::fromArray($array);
    }

    /**
     * @return void
     */
    public function testOtherText(): void
    {
        $keyCollectionDetails = $this->createKeyLocationDetailsDefaultArray([
            'other_text' => 'string',
        ]);

        $this->assertEquals('string', $keyCollectionDetails->getOtherText());
    }

    /**
     * @return void
     */
    public function testAlternativeKeyLocation(): void
    {
        $keyCollectionDetails = $this->createKeyLocationDetailsDefaultArray([
            'alternative_key_location' => [
                'city'    => 'string',
                'zip'     => 'string',
                'address' => 'string',
            ],
        ]);

        $this->assertInstanceOf(AlternativeKeyLocationDetails::class, $keyCollectionDetails->getAlternativeKeyLocation());
    }
}
