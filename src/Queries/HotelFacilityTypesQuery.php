<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereFacilityIn(array $values)
 * @method $this whereTypeIn(array $values)
 */
class HotelFacilityTypesQuery extends QueryObject
{
    public const HOTEL_FACILITY_RESULT_TYPES = ['string', 'boolean', 'integer'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'facility_type_ids'       => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereFacilityIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'hotel_facility_type_ids' => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereIdIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'types'                   => [
                'operation'    => Where::class,
                'validator'    => [OneOfValidator::class, ['values' => self::HOTEL_FACILITY_RESULT_TYPES]],
                'method_names' => ['whereTypeIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
        ];
    }
}