<?php

namespace BookingCom\Queries;


use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\Validators\IntegerValidator;

/**
 * @method $this whereThemeIdsIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 */
class HotelThemeTypesQuery extends AbstractQuery
{
    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'theme_ids' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'offset'    => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'      => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}