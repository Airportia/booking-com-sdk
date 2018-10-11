<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereHotelTypeIdsIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 */
class HotelTypesQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'hotel_type_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'offset'         => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'           => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}