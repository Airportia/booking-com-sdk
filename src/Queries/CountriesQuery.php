<?php

namespace BookingCom\Queries;


use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;

/**
 * @method $this whereCountriesIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
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
                'validator' => [CountryValidator::class],
            ],
            'offset' => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'   => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}