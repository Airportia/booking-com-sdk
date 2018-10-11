<?php

namespace BookingCom\Queries;

use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Conditions\WithCondition;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereCityIdsIn(array $values)
 * @method $this whereCountriesIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
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
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
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
            'extras'    => [
                'operation' => [WithCondition::class, ['values' => ['location', 'timezone']]],
            ],
        ];
    }
}
