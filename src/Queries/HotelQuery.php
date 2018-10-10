<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Operations\With;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereChainIn(array $values)
 * @method $this whereCityIn(array $values)
 * @method $this whereCountryIn(array $values)
 * @method $this whereDistrictIn(array $values)
 * @method $this whereRegionIn(array $values)
 * @method $this whereHotelFacilityTypeIn(array $values)
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
class HotelQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'chain_ids'               => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereChainIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'city_ids'                => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereCityIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'country_ids'             => [
                'operation'    => Where::class,
                'validator'    => [CountryValidator::class],
                'method_names' => ['whereCountryIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'district_ids'            => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereDistrictIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'hotel_facility_type_ids' => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereHotelFacilityTypeIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'hotel_ids'               => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereIdIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'region_ids'              => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereRegionIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'extras'                  => [
                'operation'    => With::class,
                'method_names' => [
                    'withHotelPolicies',
                    'withKeyCollectionInfo',
                    'withRoomDescription',
                    'withHotelPhotos',
                    'withRoomPhotos',
                    'withHotelInfo',
                    'withHotelDescription',
                    'withPaymentDetails',
                    'withRoomFacilities',
                    'withHotelFacilities',
                    'withRoomInfo',
                ],
                'result_type'  => self::RESULT_IMPLODE,
            ],
        ];
    }

}