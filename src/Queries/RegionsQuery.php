<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\OneOfValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereIdIn(array $values)
 * @method $this whereCountryIn(array $values)
 * @method $this whereTypeIn(array $values)
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
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereIdIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'countries'    => [
                'operation'    => Where::class,
                'validator'    => [CountryValidator::class],
                'method_names' => ['whereCountryIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'region_types' => [
                'operation'    => Where::class,
                'validator'    => [OneOfValidator::class, ['values' => self::REGION_TYPES]],
                'method_names' => ['whereTypeIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
        ];
    }
}