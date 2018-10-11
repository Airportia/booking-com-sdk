<?php

namespace BookingCom\Queries;

use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereRoomTypeIdsIn(array $values)
 */
class RoomTypesQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'room_type_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}