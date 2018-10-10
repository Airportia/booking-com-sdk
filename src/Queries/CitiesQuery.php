<?php

namespace BookingCom\Queries;

use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Operations\With;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereCountryIn(array $values)
 * @method $this withLocation()
 * @method $this withTimezone()
 */
class CitiesQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'city_ids'  => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereIdIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'countries' => [
                'operation'    => Where::class,
                'validator'    => [CountryValidator::class],
                'method_names' => ['whereCountryIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'extras'    => [
                'operation'    => With::class,
                'method_names' => ['withLocation', 'withTimezone'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
        ];
    }
}
