<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereCountryIn(array $values)
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
                'operation'    => Where::class,
                'validator'    => [CountryValidator::class],
                'method_names' => ['whereCountryIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
        ];
    }
}