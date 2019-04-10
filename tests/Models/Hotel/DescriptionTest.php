<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 07.10.18
 */

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;

class DescriptionTest extends TestCase
{
    public function testFromArray(): void
    {
        $description = \BookingCom\Models\Hotel\Description::fromArray([
            'hotelier_welcome_message' => 'Hotelier Welcome Message',
            'hotel_important_information' => 'Hotel Important Information',
            'hotel_description' => 'Hotel Description',
            'license_number' => 'license number',
        ]);

        $this->assertEquals('Hotelier Welcome Message', $description->getWelcomeMessage());
        $this->assertEquals('Hotel Important Information', $description->getImportantInformation());
        $this->assertEquals('Hotel Description', $description->getDescription());
        $this->assertEquals('license number', $description->getLicenseNumber());
    }

    public function testWithoutHotelierWelcomeMessage()
    {
        $description = \BookingCom\Models\Hotel\Description::fromArray([
            'hotel_important_information' => 'Hotel Important Information',
            'hotel_description' => 'Hotel Description',
            'license_number' => 'license number',
        ]);

        $this->assertNull($description->getWelcomeMessage());
        $this->assertEquals('Hotel Important Information', $description->getImportantInformation());
        $this->assertEquals('Hotel Description', $description->getDescription());
        $this->assertEquals('license number', $description->getLicenseNumber());
    }
}
