<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\QueryFields\WithArrayQueryField;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;

/**
 * @method $this whereRoomTypeIdsIn(array $values)
 * @method $this withLanguages(array $values)
 */
class RoomTypesQuery extends AbstractQuery
{
    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'room_type_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'languages' => [
                'operation' => [WithArrayQueryField::class],
                'validator' => [CountryValidator::class],
            ],
        ];
    }
}
