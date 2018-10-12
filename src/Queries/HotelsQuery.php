<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Conditions\WithCondition;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

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
class HotelsQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'chain_ids'               => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'city_ids'                => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'country_ids'             => [
                'operation' => [WhereInCondition::class],
                'validator' => [CountryValidator::class],
            ],
            'district_ids'            => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'hotel_facility_type_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'hotel_ids'               => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'region_ids'              => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'offset'                  => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'                    => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'extras'                  => [
                'operation' => [
                    WithCondition::class,
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