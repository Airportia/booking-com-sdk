<?php

namespace BookingCom\Queries;

use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereFacilityTypeIdsIn(array $values)
 */
class FacilityTypesQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'facility_type_ids' => [
                'operation'    => [WhereInCondition::class],
                'validator'    => [IntegerValidator::class],
            ],
        ];
    }
}