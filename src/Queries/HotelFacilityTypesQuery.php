<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereFacilityTypeIdsIn(array $values)
 * @method $this whereHotelFacilityTypeIdsIn(array $values)
 * @method $this whereTypesIn(array $values)
 */
class HotelFacilityTypesQuery extends QueryObject
{
    public const HOTEL_FACILITY_TYPES_RESULT_TYPES = ['string', 'boolean', 'integer'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'facility_type_ids'       => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'hotel_facility_type_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'types'                   => [
                'operation' => [WhereInCondition::class],
                'validator' => [OneOfValidator::class, ['values' => self::HOTEL_FACILITY_TYPES_RESULT_TYPES]],
            ],
        ];
    }
}