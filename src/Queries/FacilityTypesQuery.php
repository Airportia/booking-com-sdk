<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
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
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereIdIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
        ];
    }
}