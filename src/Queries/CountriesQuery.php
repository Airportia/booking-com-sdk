<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereCountriesIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 */
class CountriesQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'countries' => [
                'operation' => [WhereInCondition::class],
                'validator' => [CountryValidator::class],
            ],
            'offset' => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'   => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}