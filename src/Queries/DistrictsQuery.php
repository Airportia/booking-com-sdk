<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Conditions\WithCondition;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereTypeIn(array $values)
 * @method $this whereCityIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 * @method $this whereCountryIn(array $values)
 * @method $this withLocation()
 */
class DistrictsQuery extends QueryObject
{
    public const DISTRICT_TYPES = ['free', 'official'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'district_ids'   => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'city_ids'       => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'countries'      => [
                'operation' => [WhereInCondition::class],
                'validator' => [CountryValidator::class],
            ],
            'district_types' => [
                'operation' => [WhereInCondition::class],
                'validator' => [OneOfValidator::class, ['values' => self::DISTRICT_TYPES]],
            ],
            'offset'         => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'           => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'extras'         => [
                'operation' => [WithCondition::class, ['values' => ['location']]],
            ],
        ];
    }

}