<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\QueryFields\WithArrayQueryField;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\StringValidator;

/**
 * @method $this whereFacilityTypeIdsIn(array $values)
 * @method $this withLanguages(array $values)
 */
class FacilityTypesQuery extends AbstractQuery
{
    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'facility_type_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'languages' => [
                'operation' => [WithArrayQueryField::class],
                'validator' => [StringValidator::class, ['length' => 2]],
            ],
        ];
    }
}
