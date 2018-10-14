<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Tests\Models\Hotel;

use PHPUnit\Framework\TestCase;

class InfoTest extends TestCase
{
    public function test(): void
    {
        $hotelInfo = \BookingCom\Models\Hotel\Info::fromArray([
            'currency' => 'EUR',
            'city_id' => -2140479,
            'class' => 4,
            'url' => 'https://www.booking.com/hotel/nl/toren.html',
            'zip' => '1015 CZ',
            'checkin_checkout_times' => [
                'checkin_from' => '15:00',
                'checkout_from' => '07:00',
                'checkout_to' => '12:00',
                'checkin_to' => '',
            ],
            'creditcard_required' => true,
            'number_of_rooms' => 38,
            'location' => [
                'latitude' => 52.37586,
                'longitude' => 4.88601,
            ],
            'number_of_reviews' => 974,
            'deep_link_url' => 'booking://hotel/10004?affiliate_id=1613783',
            'exact_class' => 4,
            'hotel_type_id' => 204,
            'book_domestic_without_cc_details' => false,
            'is_closed' => false,
            'default_language' => 'en',
            'preferred' => true,
            'max_rooms_in_reservation' => 3,
            'class_is_estimated' => false,
            'spoken_languages' => ['nl', 'en', 'de'],
            'theme_ids' => [3, 5, 6, 8, 9, 14, 15, 17],
            'review_score' => 9.2,
            'max_persons_in_reservation' => 0,
            'name' => 'The Toren',
            'country' => 'nl',
            'city' => 'Amsterdam',
            'ranking' => 3894402,
            'district_id' => 145,
            'address' => 'Keizersgracht 164',
        ]);

        $this->assertEquals('EUR', $hotelInfo->getCurrency());
        $this->assertEquals(-2140479, $hotelInfo->getCityId());
        $this->assertEquals(4, $hotelInfo->getClass());
        $this->assertEquals('https://www.booking.com/hotel/nl/toren.html', $hotelInfo->getUrl());
        $this->assertEquals('1015 CZ', $hotelInfo->getZip());
        $this->assertEquals('15:00', $hotelInfo->getTimes()->getCheckInFrom());
        $this->assertEquals('07:00', $hotelInfo->getTimes()->getCheckOutFrom());
        $this->assertEquals('12:00', $hotelInfo->getTimes()->getCheckOutTo());
        $this->assertEquals(null, $hotelInfo->getTimes()->getCheckInTo());
        $this->assertEquals(true, $hotelInfo->isCreditCardRequired());
        $this->assertEquals(38, $hotelInfo->getNumberOfRooms());
        $this->assertEquals(52.37586, $hotelInfo->getLocation()->getLatitude());
        $this->assertEquals(4.88601, $hotelInfo->getLocation()->getLongitude());
        $this->assertEquals(974, $hotelInfo->getNumberOfReviews());
        $this->assertEquals('booking://hotel/10004?affiliate_id=1613783', $hotelInfo->getDeepLinkUrl());
        $this->assertEquals(4, $hotelInfo->getExactClass());
        $this->assertEquals(204, $hotelInfo->getHotelTypeId());
        $this->assertEquals(false, $hotelInfo->isBookDomesticWithoutCcDetails());
        $this->assertEquals(false, $hotelInfo->isClosed());
        $this->assertEquals('en', $hotelInfo->getDefaultLanguage());
        $this->assertEquals(true, $hotelInfo->isPreferred());
        $this->assertEquals(3, $hotelInfo->getMaxRoomsInReservation());
        $this->assertEquals(false, $hotelInfo->isClassIsEstimated());
        $this->assertEquals(['nl', 'en', 'de'], $hotelInfo->getSpokenLanguages());
        $this->assertEquals([3, 5, 6, 8, 9, 14, 15, 17], $hotelInfo->getThemeIds());
        $this->assertEquals(9.2, $hotelInfo->getReviewScore());
        $this->assertEquals(0, $hotelInfo->getMaxPersonsInReservation());
        $this->assertEquals('The Toren', $hotelInfo->getName());
        $this->assertEquals('nl', $hotelInfo->getCountry());
        $this->assertEquals('Amsterdam', $hotelInfo->getCity());
        $this->assertEquals(3894402, $hotelInfo->getRanking());
        $this->assertEquals(145, $hotelInfo->getDistrictId());
        $this->assertEquals('Keizersgracht 164', $hotelInfo->getAddress());
    }
}
