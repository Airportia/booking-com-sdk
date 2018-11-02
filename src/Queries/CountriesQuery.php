<?php

namespace BookingCom\Queries;

use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\QueryFields\WithArrayQueryField;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\StringValidator;

/**
 * @method $this whereCountriesIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 * @method $this withLanguages(array $values)
 */
class CountriesQuery extends AbstractQuery
{
    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'countries' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [StringValidator::class, ['length' => 2]],
            ],
            'offset' => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows' => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'languages' => [
                'operation' => [WithArrayQueryField::class],
                'validator' => [StringValidator::class, ['length' => 2]],
            ],
        ];
    }
}
