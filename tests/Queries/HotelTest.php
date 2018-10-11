<?php

namespace BookingCom\Tests\Queries;

use BookingCom\Queries\HotelQuery;
use PHPUnit\Framework\TestCase;

class HotelTest extends TestCase
{
    /**
     * @return void
     */
    public function testQuery(): void
    {
        $query = new HotelQuery();

        $this->assertEquals([], $query->toArray());

        $query->whereChainIdsIn([1, 2, 3, 4])
            ->whereCityIdsIn([1, 2, 3, 4, 5])
            ->whereCountryIdsIn(['us', 'ua'])
            ->whereDistrictIdsIn([1, 2, 3])
            ->whereHotelFacilityTypeIdsIn([1, 5, 7])
            ->setRows(5)
            ->setOffset(5)
            ->whereHotelIdsIn([5, 6])
            ->whereRegionIdsIn([3, 4])
            ->withHotelPolicies()
            ->withKeyCollectionInfo()
            ->withRoomDescription()
            ->withHotelPhotos()
            ->withRoomPhotos()
            ->withHotelInfo()
            ->withHotelDescription()
            ->withRoomInfo()
            ->withPaymentDetails()
            ->withRoomFacilities()
            ->withHotelFacilities();

        $this->assertEquals([
            'chain_ids'               => '1,2,3,4',
            'city_ids'                => '1,2,3,4,5',
            'country_ids'             => 'us,ua',
            'district_ids'            => '1,2,3',
            'hotel_facility_type_ids' => '1,5,7',
            'hotel_ids'               => '5,6',
            'region_ids'              => '3,4',
            'offset'                  => 5,
            'rows'                    => 5,
            'extras'                  => 'hotel_policies,key_collection_info,room_description,hotel_photos,room_photos,hotel_info,hotel_description,room_info,payment_details,room_facilities,hotel_facilities',
        ], $query->toArray());
    }
}
