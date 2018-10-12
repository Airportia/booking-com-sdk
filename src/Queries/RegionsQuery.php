<?php

namespace BookingCom\Queries;


use BookingCom\Queries\QueryFields\SetQueryField;
use BookingCom\Queries\QueryFields\WhereInQueryField;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;

/**
 * @method $this whereRegionIdsIn(array $values)
 * @method $this whereCountriesIn(array $values)
 * @method $this whereRegionTypesIn(array $values)
 * @method $this setOffset(int $value)
 * @method $this setRows(int $value)
 */
class RegionsQuery extends AbstractQuery
{
    public const REGION_TYPES = ['island', 'province', 'free_region', 'other'];

    /**
     * @return array
     */
    protected function fields(): array
    {
        return [
            'region_ids'   => [
                'operation' => [WhereInQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'countries'    => [
                'operation' => [WhereInQueryField::class],
                'validator' => [CountryValidator::class],
            ],
            'region_types' => [
                'operation' => [WhereInQueryField::class],
                'validator' => [OneOfValidator::class, ['values' => self::REGION_TYPES]],
            ],
            'offset'       => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
            'rows'         => [
                'operation' => [SetQueryField::class],
                'validator' => [IntegerValidator::class],
            ],
        ];
    }
}