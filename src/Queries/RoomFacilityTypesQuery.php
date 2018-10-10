<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereFacilityIn(array $values)
 * @method $this whereTypeIn(array $values)
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
            'facility_type_ids'       => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereFacilityIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'room_facility_type_ids' => [
                'operation' => Where::class,
                'validator' => [IntegerValidator::class],
                'method_names' => ['whereIdIn'],
                'result_type' => self::RESULT_IMPLODE,
            ],
            'types' => [
                'operation' => Where::class,
                'validator' => [OneOfValidator::class, ['values' => self::ROOM_FACILITY_TYPES_RESULT_TYPES]],
                'method_names' => ['whereTypeIn'],
                'result_type' => self::RESULT_IMPLODE,
            ]
        ];
    }
}