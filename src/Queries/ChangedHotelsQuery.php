<?php

namespace BookingCom\Queries;


use BookingCom\Queries\Operations\Where;
use BookingCom\Queries\Validators\CountryValidator;
use BookingCom\Queries\Validators\IntegerValidator;
use BookingCom\Queries\Validators\StringValidator;
use BookingCom\QueryObject;

/**
 * @method $this whereCityIn(array $values)
 * @method $this whereCountryIn(array $values)
 * @method $this whereRegionIn(array $values)
 * @method $this whereLastChangeIn(array $values)
 */
class ChangedHotelsQuery extends QueryObject
{
    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'city_ids'    => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereCityIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'countries'   => [
                'operation'    => Where::class,
                'validator'    => [CountryValidator::class],
                'method_names' => ['whereCountryIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'region_ids'  => [
                'operation'    => Where::class,
                'validator'    => [IntegerValidator::class],
                'method_names' => ['whereRegionIn'],
                'result_type'  => self::RESULT_IMPLODE,
            ],
            'last_change' => [
                'operation'    => Where::class,
                'validator'    => [StringValidator::class],
                'method_names' => ['whereLastChangeIn'],
                'result_type'  => self::RESULT_STRING,
            ],
        ];
    }
}