<?php

namespace BookingCom\Tests\Models\Hotel;

use BookingCom\Models\Hotel\HotelData;
use BookingCom\Models\Hotel\HotelFacility;
use BookingCom\Models\Hotel\HotelInternalObjects\CheckinCheckoutTimes;
use BookingCom\Models\Location\Location;
use PHPUnit\Framework\TestCase;

class HotelDataTest extends TestCase
{
    /**
     * @return void
     */
    public function testCheckinCheckoutTimes(): void
    {
        $hotelData = HotelData::fromArray([
            'checkin_checkout_times' => [
                'checkin_from'  => '14:00',
                'checkout_from' => '07:00',
                'checkout_to'   => '12:00',
                'checkin_to'    => '22:00',
            ],
        ]);

        $this->assertInstanceOf(CheckinCheckoutTimes::class, $hotelData->getCheckinCheckoutTimes());
    }

    /**
     * @return void
     */
    public function testClassIsEstimated(): void
    {
        $hotelData = HotelData::fromArray([
            'class_is_estimated' => false,
        ]);

        $this->assertEquals(false, $hotelData->getClassIsEstimated());
    }

    /**
     * @return void
     */
    public function testHotelPolicies(): void
    {
        $hotelData = HotelData::fromArray([
            'hotel_policies' => [
                'name'    => 'Groups',
                'content' => 'When booking more than 5 rooms, different policies and additional supplements may apply.\n',
                'type'    => 'POLICY_HOTEL_INTERNET',
            ],
        ]);
    }

    /**
     * @return void
     */
    public function testHotelPhotos(): void
    {
        $hotelData = HotelData::fromArray([
            'url_square60'  => 'https://aff.bstatic.com/images/hotel/square60/106/106787402.jpg',
            'url_original'  => 'https://aff.bstatic.com/images/hotel/max500/106/106787402.jpg',
            'url_max300'    => 'https://aff.bstatic.com/images/hotel/max300/106/106787402.jpg',
            'main_photo'    => true,
            'auto_tags'     => [
                'tag_name' => 'Lounge/Bar',
                'tag_id'   => 1,
            ],
            'is_logo_photo' => true,
            'tags'          => [
                'Bedroom',
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(HotelPhoto::class, $hotelData->getHotelPhotos());
    }

    /**
     * @return void
     */
    public function testSpokenLanguages(): void
    {
        $hotelData = HotelData::fromArray([
            'spoken_languages' => [
                'en',
            ],
        ]);

        $this->assertEquals(['en'], $hotelData->getSpokenLanguages());
    }

    /**
     * @return void
     */
    public function testZip(): void
    {
        $hotelData = HotelData::fromArray([
            'zip' => '1017CE',
        ]);

        $this->assertEquals('1017CE', $hotelData->getZip());
    }

    /**
     * @return void
     */
    public function testKeyCollectionInfo(): void
    {
        $hotelData = HotelData::fromArray([
            'key_collection_info' => [
                'alternative_key_location' => [
                    'city'    => 'string',
                    'zip'     => 'string',
                    'address' => 'string',
                ],
                'other_text'               => 'string',
                'key_location'             => 'at_the_property',
                'how_to_collect'           => 'lock_box',
            ],
        ]);

        $this->assertInstanceOf(KeyCollectionDetailsTest::class, $hotelData->getKeyCollectionInfo());
    }

    /**
     * @return void
     */
    public function testDistrictId(): void
    {
        $hotelData = HotelData::fromArray([
            'district_id' => 145,
        ]);

        $this->assertEquals(145, $hotelData->getDistrictId());
    }

    /**
     * @return void
     */
    public function testDeepLinkUrl(): void
    {
        $hotelData = HotelData::fromArray([
            'deep_link_url' => 'booking://hotel/10004?affiliate_id=956509',
        ]);

        $this->assertEquals('booking://hotel/10004?affiliate_id=956509', $hotelData->getDeepLinkUrl());
    }

    /**
     * @return void
     */
    public function testMaxRoomsInReservation(): void
    {
        $hotelData = HotelData::fromArray([
            'max_rooms_in_reservation' => '0',
        ]);

        $this->assertEquals('0', $hotelData->getMaxRoomsInReservation());
    }

    /**
     * @return void
     */
    public function testUrl(): void
    {
        $hotelData = HotelData::fromArray([
            'url' => 'https://www.booking.com/hotel/nl/toren.html',
        ]);

        $this->assertEquals('https://www.booking.com/hotel/nl/toren.html', $hotelData->getUrl());
    }

    /**
     * @return void
     */
    public function testClass(): void
    {
        $hotelData = HotelData::fromArray([
            'class' => '4',
        ]);

        $this->assertEquals('4', $hotelData->getClass());
    }

    /**
     * @return void
     */
    public function testLicenseNumber(): void
    {
        $hotelData = HotelData::fromArray([
            'license_number' => 'AA000000001',
        ]);

        $this->assertEquals('AA000000001', $hotelData->getLicenseNumber());
    }

    /**
     * @return void
     */
    public function testHotelFacilities(): void
    {
        $hotelData = HotelData::fromArray([
            'hotel_facilities' => [
                [
                    'hotel_facility_type_id' => 4,
                    'attrs'                  => [
                        'Extra attribute of this facility.',
                    ],
                    'name'                   => 'Pets allowed',
                ],
            ],
        ]);

        $this->assertContainsOnlyInstancesOf(HotelFacility::class, $hotelData->getHotelFacilities());
    }

    /**
     * @return void
     */
    public function testExactClass(): void
    {
        $hotelData = HotelData::fromArray([
            'exact_class' => '4.5',
        ]);

        $this->assertEquals('4.5', $hotelData->getExactClass());
    }

    /**
     * @return void
     */
    public function testIsClosed(): void
    {
        $hotelData = HotelData::fromArray([
            'is_closed' => false,
        ]);

        $this->assertEquals(false, $hotelData->isClosed());
    }

    /**
     * @return void
     */
    public function testCreditCardRequired(): void
    {
        $hotelData = HotelData::fromArray([
            'creditcard_required' => true,
        ]);

        $this->assertEquals(true, $hotelData->getCreditCardRequired());
    }

    /**
     * @return void
     */
    public function testHotelDescription(): void
    {
        $hotelData = HotelData::fromArray([
            'hotel_description' => 'This is the best hotel in the world.',
        ]);

        $this->assertEquals('This is the best hotel in the world.', $hotelData->getHotelDescription());
    }

    /**
     * @return void
     */
    public function testChainIds(): void
    {
        $hotelData = HotelData::fromArray([
            'chain_id' => [
                1493,
            ],
        ]);

        $this->assertEquals([1493], $hotelData->getChainIds());
    }

    /**
     * @return void
     */
    public function testNumberOfReviews(): void
    {
        $hotelData = HotelData::fromArray([
            'number_of_reviews' => 513,
        ]);

        $this->assertEquals(513, $hotelData->getNumberOfReviews());
    }

    /**
     * @return void
     */
    public function testBookDomesticWithoutCCDetails(): void
    {
        $hotelData = HotelData::fromArray([
            'book_domestic_without_cc_details' => false,
        ]);

        $this->assertEquals(false, $hotelData->getBookDomesticWithoutCCDetails());
    }

    /**
     * @return void
     */
    public function testCurrency(): void
    {
        $hotelData = HotelData::fromArray([
            'currency' => 'EUR',
        ]);

        $this->assertEquals('EUR', $hotelData->getCurrency());
    }

    /**
     * @return void
     */
    public function testCity(): void
    {
        $hotelData = HotelData::fromArray([
            'city' => 'Amsterdam',
        ]);

        $this->assertEquals('Amsterdam', $hotelData->getCity());
    }

    /**
     * @return void
     */
    public function testCountry(): void
    {
        $hotelData = HotelData::fromArray([
            'country' => 'nl',
        ]);

        $this->assertEquals('nl', $hotelData->getCountry());
    }

    /**
     * @return void
     */
    public function testHotelierWelcomeMessage(): void
    {
        $hotelData = HotelData::fromArray([
            'hotel_important_information' => 'You have to pay tourism tax of 3%.',
        ]);

        $this->assertEquals('You have to pay tourism tax of 3%.', $hotelData->getHotelImportantInformation());
    }

    /**
     * @return void
     */
    public function testPreferred(): void
    {
        $hotelData = HotelData::fromArray([
            'preferred' => false,
        ]);

        $this->assertEquals(false, $hotelData->getPreferred());
    }

    /**
     * @return void
     */
    public function testMaxPersonsInReservation(): void
    {
        $hotelData = HotelData::fromArray([
            'max_persons_in_reservation' => '0',
        ]);

        $this->assertEquals('0', $hotelData->getMaxPersonsInReservation());
    }

    /**
     * @return void
     */
    public function testCityId(): void
    {
        $hotelData = HotelData::fromArray([
            'city_id' => -2140479,
        ]);

        $this->assertEquals(-2140479, $hotelData->getCityId());
    }

    /**
     * @return void
     */
    public function testHotelTypeId(): void
    {
        $hotelData = HotelData::fromArray([
            'hotel_type_id' => 204,
        ]);

        $this->assertEquals(204, $hotelData->getHotelTypeId());
    }

    /**
     * @return void
     */
    public function testNumberOfRooms(): void
    {
        $hotelData = HotelData::fromArray([
            'number_of_rooms' => 440,
        ]);

        $this->assertEquals(440, $hotelData->getNumberOfRooms());
    }

    /**
     * @return void
     */
    public function testAddress(): void
    {
        $hotelData = HotelData::fromArray([
            'address' => 'Keizersgracht 164',
        ]);

        $this->assertEquals('Keizersgracht 164', $hotelData->getAddress());
    }

    /**
     * @return void
     */
    public function testLocation(): void
    {
        $hotelData = HotelData::fromArray([
            'location' => [
                'longitude' => '4.886006',
                'latitude'  => '52.375859',
            ],
        ]);

        $this->assertInstanceOf(Location::class, $hotelData->getLocation());
    }

    /**
     * @return void
     */
    public function testDefaultLanguage(): void
    {
        $hotelData = HotelData::fromArray([
            'default_language' => 'en',
        ]);

        $this->assertEquals('en', $hotelData->getDefaultLanguage());
    }

    /**
     * @return void
     */
    public function testReviewScore(): void
    {
        $hotelData = HotelData::fromArray([
            'review_score' => 7.1,
        ]);

        $this->assertEquals(7.1, $hotelData->getReviewScore());
    }

    /**
     * @return void
     */
    public function testThemeIds(): void
    {
        $hotelData = HotelData::fromArray([
            'theme_ids' => [
                1,
            ],
        ]);

        $this->assertEquals([1], $hotelData->getThemeIds());
    }

    /**
     * @return void
     */
    public function testRanking(): void
    {
        $hotelData = HotelData::fromArray([
            'ranking' => 1802753,
        ]);

        $this->assertEquals(1802753, $hotelData->getRanking());
    }

}
