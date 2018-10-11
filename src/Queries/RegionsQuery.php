<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Conditions\SetCondition;
use BookingCom\Queries\Conditions\WhereInCondition;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereRegionIdsIn(array $values)
 * @method $this whereCountriesIn(array $values)
 * @method $this whereRegionTypesIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 */
class RegionsQuery extends QueryObject
{
    public const REGION_TYPES = ['island', 'province', 'free_region', 'other'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'region_ids'   => [
                'operation' => [WhereInCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'countries'    => [
                'operation' => [WhereInCondition::class],
                'validator' => [CountryValidator::class],
            ],
            'region_types' => [
                'operation' => [WhereInCondition::class],
                'validator' => [OneOfValidator::class, ['values' => self::REGION_TYPES]],
            ],
            'offset'       => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'         => [
                'operation' => [SetCondition::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}