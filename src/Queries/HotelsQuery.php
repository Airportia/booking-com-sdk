<?php

namespace BookingCom\Queries;


use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\QueryFields\WithQueryField;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;

/**
 * @method $this whereHotelIdsIn(array $values)
 * @method $this whereChainIdsIn(array $values)
 * @method $this whereCityIdsIn(array $values)
 * @method $this whereCountryIdsIn(array $values)
 * @method $this whereDistrictIdsIn(array $values)
 * @method $this whereRegionIdsIn(array $values)
 * @method $this whereHotelFacilityTypeIdsIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 * @method $this withHotelPolicies()
 * @method $this withRoomInfo()
 * @method $this withKeyCollectionInfo()
 * @method $this withRoomDescription()
 * @method $this withHotelPhotos()
 * @method $this withRoomPhotos()
 * @method $this withHotelInfo()
 * @method $this withHotelDescription()
 * @method $this withPaymentDetails()
 * @method $this withRoomFacilities()
 * @method $this withHotelFacilities()
 */
class HotelsQuery extends AbstractQuery
{
    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'chain_ids'               => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'city_ids'                => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'country_ids'             => [
                'operation' => [WhereInQueryField::class],
                'validator' => [CountryValidator::class],
            ],
            'district_ids'            => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'hotel_facility_type_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'hotel_ids'               => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'region_ids'              => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'offset'                  => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'                    => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'extras'                  => [
                'operation' => [
                    WithQueryField::class,
                    [
                        'values' => [
                            'hotel_policies',
                            'key_collection_info',
                            'room_description',
                            'hotel_photos',
                            'room_photos',
                            'hotel_info',
                            'hotel_description',
                            'room_info',
                            'payment_details',
                            'room_facilities',
                            'hotel_facilities',
                        ],
                    ],
                ],
            ],
        ];
    }

}