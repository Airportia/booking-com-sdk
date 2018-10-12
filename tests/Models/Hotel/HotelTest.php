<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 06.10.18
 */

namespace BookingCom\Tests\Models\Hotel;


use BookingCom\Models\Hotel\Facility;
use BookingCom\Models\Hotel\Hotel;
use BookingCom\Models\Hotel\Photo;
use BookingCom\Models\Hotel\Policy;
use BookingCom\Models\Payment\PaymentDetail;
use BookingCom\Tests\__support\ArraysProvider;
use PHPUnit\Framework\TestCase;

class HotelTest extends TestCase
{
    public function testHotel(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
        ]);

        $this->assertEquals($hotel->getId(), 10004);
    }

    public function testInfo(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'hotel_data' => [
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
            ],
        ]);
        $this->assertInstanceOf(\BookingCom\Models\Hotel\Info::class, $hotel->getInfo());
    }

    public function testPhotos(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'hotel_data' => [
                'hotel_photos' => [
                    [
                        'url_original' => 'https://q-xx.bstatic.com/xdata/images/hotel/max500/20934654.jpg?k=806399263699a47361bdbbefc9c872a3db03eea26c4a815f5f4df95c93e38cdb&o=',
                        'main_photo' => true,
                        'url_max300' => 'https://q-xx.bstatic.com/xdata/images/hotel/max300/20934654.jpg?k=806399263699a47361bdbbefc9c872a3db03eea26c4a815f5f4df95c93e38cdb&o=',
                        'url_square60' => 'https://q-xx.bstatic.com/xdata/images/hotel/square60/20934654.jpg?k=806399263699a47361bdbbefc9c872a3db03eea26c4a815f5f4df95c93e38cdb&o=',
                        'is_logo_photo' => true,
                    ],
                ],
            ],
        ]);
        $this->assertNotEmpty($hotel->getPhotos());
        $this->assertContainsOnlyInstancesOf(Photo::class, $hotel->getPhotos());
    }

    public function testRooms(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'room_data' => [
                [
                    'room_id' => 1000405,
                ],
            ],
        ]);
        $this->assertNotEmpty($hotel->getRooms());
        $this->assertContainsOnlyInstancesOf(\BookingCom\Models\Room\Room::class, $hotel->getRooms());
    }

    public function testPaymentDetails(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'hotel_data' => [
                'payment_details' => [
                    [
                        'payment_id' => 8,
                        'cvc_required' => false,
                        'payable' => true,
                        'bookable' => false,
                    ],
                ],
            ],
        ]);

        $this->assertNotEmpty($hotel->getPaymentDetails());
        $this->assertContainsOnlyInstancesOf(PaymentDetail::class, $hotel->getPaymentDetails());
    }

    public function testDescription(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'hotel_data' => [
                'hotelier_welcome_message' => 'Hotelier Welcome Message',
                'hotel_important_information' => 'Hotel Important Information',
                'hotel_description' => 'Hotel Description',
                'license_number' => '',
            ],
        ]);

        $this->assertInstanceOf(\BookingCom\Models\Hotel\Description::class, $hotel->getDescription());
    }

    public function testPolicies(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'hotel_data' => [
                'hotel_policies' => [
                    [
                        'type' => 'POLICY_HOTEL_GROUPS',
                        'content' => 'Policy content',
                        'name' => 'Groups',
                    ],
                ],
            ],
        ]);

        $this->assertNotEmpty($hotel->getPolicies());
        $this->assertContainsOnlyInstancesOf(Policy::class, $hotel->getPolicies());
    }

    public function testFacilities(): void
    {
        $hotel = Hotel::fromArray([
            'hotel_id' => 10004,
            'hotel_data' => [
                'hotel_facilities' => [
                    [
                        'name' => 'Newspapers',
                        'hotel_facility_type_id' => 13,
                        'attrs' => [
                            'paid',
                        ],
                    ],
                ],
            ],
        ]);

        $this->assertNotEmpty($hotel->getFacilities());
        $this->assertContainsOnlyInstancesOf(Facility::class, $hotel->getFacilities());
    }

    /**
     * @dataProvider arraysProvider
     * @param $array
     */
    public function testBookingArrays($array): void
    {
        $this->expectNotToPerformAssertions();
        Hotel::fromArray($array);
    }

    public function arraysProvider(): array
    {
        return ArraysProvider::getItems(ArraysProvider::HOTELS);
    }

}