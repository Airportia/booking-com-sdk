<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereRoomFacilityTypeIdsIn(array $values)
 * @method $this whereFacilityTypeIdsIn(array $values)
 * @method $this whereTypesIn(array $values)
 */
class RoomFacilityTypesQuery extends QueryObject
{
    public const ROOM_FACILITY_TYPES_RESULT_TYPES = ['string', 'boolean', 'integer'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'facility_type_ids'      => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'room_facility_type_ids' => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'types'                  => [
                'operation' => [WhereInCondition::class],
                'validator' => [OneOfValidator::class, ['values' => self::ROOM_FACILITY_TYPES_RESULT_TYPES]],
            ],
        ];
    }
}